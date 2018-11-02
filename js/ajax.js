$(document).ready(function(){

	function getLang($file,$key){
		return Lang.messages[window.locale+"."+$file][$key];
	}
	/*
	* Ajax Call to check admission documents of a student
	* returns names of documents from database and check for each of them
	*/
	$("#doc_check_list").click(function(e){
		id = $(this).attr('data-id');
		$.ajax({
			method: "get",
			url: window.location.pathname+"/document_checklist",
			success: function(res){
				$(".modal-title").html(res.title);
				html_text = "<table class='table table-bordered'>";
				$.each(res.documents,function(i,e){
					html_text += "<tr><th>"+e.name+"</th>";
					if(e.submitted)
						html_text += "<th><input type='checkbox' disabled='disabled' checked='true' name='"+e.name+"' class='remove-document'></th>";
					else
						html_text += "<th><input type='checkbox' name='"+e.name+"' class='add-document'></th>";
					html_text += "</tr>";
				});		
			    html_text += "</table>";
			    $(".modal-body").html(html_text);
			}
		});
	});

	/*
	* Ajax Call to add admission document to current student
	*/
	$(".modal-body").on('click',".add-document", function(e){
		$.ajax({
			method: "post",
			url: window.location.pathname+"/add_sudent_document",
			headers: {'X-CSRF-TOKEN':$("[name='_token']").val()},
			data:{'document':$(e.target).attr('name')},
			dataType: 'json',
			success: function(res){
				alert(res.message);
				$(e.target).attr('disabled','disabled');
			}
		});
	});

	/*
	* Ajax Call to check admission documents of a student and 
	* then checks military data for this student 
	* returns military data fields if they are filled
	* or redirects to page to enter military data
	*/
	$("#military-data").click(function(e){
		$.ajax({
			method: "get",
			url:window.location.pathname+"/document_check",
			dataType:"json",
			success:function(res){
				$(".modal-title").html(res.title);
				if(res.complete === 2){
					html_text = "<table class='table table-bordered'>";
					for(var k in res.data[0]){
						// console.log(Lang.messages[window.locale+'.MilitaryData']);
						html_text += "<tr><th>"+getLang('MilitaryData',k.replace("military_",""))+"</th>";
						html_text += "<td>"+res.data[0][k]+"</td></tr>";
					}
				    html_text += "</table>";
				    html_text += "<a href='"+window.location.pathname+"/edit_military_data' class='btn btn-primary'>Edit</a>";
				    $(".modal-body").html(html_text);
				}else if(res.complete === 1){
					html_text = "<div class='alert alert-success'>"+res.message+"</div>";
					$(".modal-body").html(html_text);
					setTimeout(function(){
					    window.location.href = window.location.pathname+"/add_military_data";
					}, 2000);
				}else{
					html_text = "<div class='alert alert-warning'>"+res.message+"</div>";
					$(".modal-body").html(html_text);
				}
			}
		});
	});

	/*
	* Ajax Call to check if student paid admission fees
	* returns admission fees data fields if they are filled
	* or redirects to page to enter admission fees
	*/
	$("#admission-fees").click(function(){
		$.ajax({
			method: "get",
			url:window.location.pathname+"/fees_check",
			dataType:"json",
			success:function(res){
				$(".modal-title").html(res.title);
				if(res.complete === 1){
					html_text = "<div class='alert alert-success'>"+res.message+"</div>"
					html_text += "<table class='table table-bordered'>";
					for(var k in res.data){
						// console.log(k);
						html_text += "<tr><th>"+getLang('Payment',k)+"</th>";
						html_text += "<td>"+res.data[k]+"</td></tr>";
					}
				    html_text += "</table>";
				    html_text += "<a href='"+window.location.pathname+"/edit_student_fees' class='btn btn-primary'>Edit</a>";
				    $(".modal-body").html(html_text);
				}else if(res.complete === 0){
					html_text = "<div class='alert alert-warning'>"+res.message+"</div>";
					$(".modal-body").html(html_text);
					setTimeout(function(){
					    window.location.href = window.location.pathname+"/student_admission_fees";
					}, 2000);
				}
			}
		});
	});

	/*
	* Function to add military delay fields in edit/add military data page
	*/
	$(".container").one("click",".military-delay",function(e){
		form = $(this).parents("form");
		submit = $(form).children(".form-group").last();
		if($(this).val() == 'yes' && $(this).parents("form").find(".datepicker").length==0)
		{
			html_text = "<div class='form-group row'>"
		    html_text += "<label for='military_delay_number' class='col-sm-3 col-form-label'>"+getLang('MilitaryData','delay_number')+"</label>"
		    html_text += "<div class='col-sm-9'>"
		    html_text += "<input type='number' name='military_delay_number' class='form-control'>"
		    html_text += "</div></div>";
		    html_text += "<div class='form-group row'>"
		    html_text += "<label for='military_delay_date' class='col-sm-3 col-form-label'>"+getLang('MilitaryData','delay_date')+"</label>"
		    html_text += "<div class='col-sm-9'>"
		    html_text += "<input type='text' name='military_delay_date' class='form-control datepicker' autocomplete='off'>"
		    html_text += "</div></div>";

		    $(html_text).insertBefore(submit);
		    activate_datepicker();
		}
	});

	/*
	* Ajax call to create a student academic record after all admission steps are done
	*/
	$("#add_acad_record").click(function(e){
		e.preventDefault();
		var url = window.location.pathname.substr(window.location.pathname.lastIndexOf('/') + 1) + '$';
    	url = window.location.pathname.replace( new RegExp(url), '' );

		$.ajax({
			method: "get",
			url:url+"fees_check",
			dataType:"json",
			success:function(res){
				$(".modal-title").html(res.title);
				if(res.complete === 1){
					html_text = "<div class='alert alert-success'>"+res.message+"</div>"
					
					$.ajax({
						method: "get",
						url:url+"generate_form",
						dataType:"json",
						success:function(res){
							html_text = MakeForm(res, []);
						}
					});

				    $(".modal-body").html(html_text);
				}else if(res.complete === 0){
					html_text = "<div class='alert alert-warning'>"+res.message+"</div>";
					$(".modal-body").html(html_text);
				}
			}
		});
	});

	/*
	* Ajax call to edit the student academic record after all admission steps are done
	*/
	$("#edit_acad_record").click(function(){
		$.ajax({
			method: "get",
			url:window.location.pathname+"/Majors",
			dataType:"json",
			success:function(res){
				$(".modal-title").html(res.title);
				html_text = "<form action='"+window.location.pathname+res.save_url+"' id='save_acad_record' method='post'>"
				html_text += "<div class='form-group row'>";
			    html_text += "<label for='major_id' class='col-sm-3 col-form-label'>"+getLang('StudentAcademicRecord','major_id')+": </label>";
			    html_text += "<div class='col-sm-9'>";
			    html_text += "<select name='major_id' id='select_major' class='form-control'>";
			    html_text += "<option value='default' style='display:none;' selected>"+getLang('generic','select')+" "+getLang('StudentAcademicRecord','major_id')+":</option>";
			    
			    $(res.majors).each(function(ind,elem){
			    	html_text += "<option value='"+elem.major_id+"'>"+elem.major_name+"</option>";
			    });

			    html_text += "</select></div></div>";
			    html_text += "<div class='form-group row'>";
			    html_text += "<label for='specialization_id' class='col-sm-3 col-form-label'>"+getLang('StudentAcademicRecord','specialization_id')+":</label>";
			    html_text += "<div class='col-sm-9'>";
			    html_text += "<select name='specialization_id' id='select_specialization' class='form-control'>";
			    html_text += "<option value='default' style='display:none;' disabled selected>"+getLang('generic','select')+" "+getLang('StudentAcademicRecord','major_id')+"</option>";
			    html_text += "</select></div></div></form>";
			    $(".modal-body").html(html_text);
			}
		});
	});

	/*
	* Ajax call when major is changed to load all specializations in this selected major
	*/
	$(".modal-body").on("change","#select_major",function(e){
		var major_id = e.target.value;
		$.ajax({
			method: "get",
			url:"/Specializations/"+major_id,
			dataType:"json",
			success:function(res){
			    html_text = "<option value='default' style='display:none;' selected>"+getLang('generic','select')+" "+getLang('StudentAcademicRecord','specialization_id')+"</option>";
			    $(res).each(function(ind,elem){
			    	html_text += "<option value='"+elem.specialization_id+"'>"+elem.specialization_name+"</option>";
			    });
			    $("#select_specialization").html(html_text);

			    if($("#save_acad_record").children().length == 2){
				    submit = "<div class='form-group text-center'><input type='submit' value='"+getLang('generic','save')+"' class='btn btn-primary'/></div>";
				    $("#save_acad_record").append(submit);
				}
			}
		});
	});

	/*
	* Ajax call to update the student academic record after major and specialization are chosen
	*/
	$(".modal-body").on("submit","#save_acad_record",function(e){
		e.preventDefault();
		url = e.target.action
		$.ajax({
			method: "post",
			url:url,
			headers: {'X-CSRF-TOKEN':$("[name='_token']").val()},
			data: $(e.target).serialize(),
			dataType:"json",
			success:function(res){
				if(res.saved)
					html_text = "<div class='alert alert-success'>"+res.message+"</div>";
				else
					html_text = "<div class='alert alert-danger'>"+res.message+"</div>";
				$(".modal-body").html(html_text);
				setTimeout(function(){$("#exampleModal").modal("hide");},2000);
			}
		});
	});

	$('.continue').click(function(){
		$("a.active").parents("li").next('li').find('a').trigger('click');
	});

	if(window.location.pathname.indexOf("AdmissionReports")>0){
		$("#sidebar").removeClass('show');
	}

});