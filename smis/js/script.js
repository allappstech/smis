$(document).ready(function () {	
  
 //semesters

	$('#college').change(function(){
		
	var College_id=$(this).val();
	var div=$(this).parent();
	var op="";
	$.ajax({
		type: "get",
		url: '/SelectProgram',
		data: {College_id:College_id},
		success: function(data){
			 
			$('#department').html(data)
		 
		}		
	});
	});


  $('#state').change(function(){
  
  var state_id=$(this).val();
    //alert(state);
  $.ajax({
    type: "get",
    url: '/getalllga',
    data: {state_id:state_id},
    success: function(data){
     // alert(data);
      $('#lga').html(data)
     
    }   
  });
  });

		$('#department').change(function(){
		
	var Department_id=$(this).val();
	var div=$(this).parent();
	var op="";
	$.ajax({
		type: "get",
		url: '/SelectCourse',
		data: {'Department_id':Department_id},
		success: function(data){
			 
			$('#program').html(data)
		 
		}
		
		
	});
	});

/////////////////////// return cource
	$('#year').change(function(){		
	var year=$(this).val();

	var programs=$('#programs').val();	 
	$.ajax({
		type: "get",
		url: '/returncouces',
		data: {'year':year},
		success: function(data){		 
			$('#course').html(data)	
			//alert(data);
		}
			
	   });
	});

	/////////////////////// return cource
	$('#semesters').change(function(){	
  	
	var semesters=$(this).val();
	var Department_id=$('#department').val();
	var programs=$('#programs').val();
	
	var year=$('#year').val();	
       //alert(897);	
	$.ajax({
		type: "get",
		url: '/returncore',
		data: {semesters:semesters,Department_id:Department_id,year:year,programs:programs},
		success: function(data){		 
			$('#course').html(data)	
			 //0++
			// alert(data);
		}
			
	   });
	});

		
     
  $("form#formoid").submit(function(event){
  event.preventDefault(); 
  var formData = new FormData($(this)[0]);
 // alert("Submggggggggggggggggggggggggggitted");
     $.ajax({
    url: $(this).attr('action'),
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    beforeSend:function() {
  $('.loader').show();
    },
	complete: loadStop,
 
    success: function (data) {
		$('#proceed-link').show();
	$('.results').html(data);
	
     }
});

});

$('.ca').hide();
$('.ex').hide();
$('.save').hide();
$('.cack').click(function(){

	var id = $(this).attr("id");
	var getca='ca'+id;	
	var tds='tdca'+id;

	var getex='ex'+id;
	var tde='tdex'+id;
	  var x = document.getElementById(getca);
	  var ex = document.getElementById(getex);
 
     if (x.style.display === "none") {
     	$('.ca').hide();
     	$('.tdca').show();
     	$('#'+tds).hide();

     	$('.ex').hide();
     	$('.tdex').show();
     	$('#'+tde).hide();
     	$('.save').hide();



    x.style.display = "block";
    ex.style.display = "block";
    $('#save'+id).show();

  } else {
    x.style.display = "none";
    ex.style.display = "none";
      $('#save'+id).hide();
      $('.tdca').show();
      $('.tdex').show();
  }

});
 //$('.loader2').show();
$('.save').click(function(){
	//var ids = $(this).attr("id");
	var ids = this.id.match(/\d+/); 	
	var ca='ca'+ids;	
	var exam='ex'+ids;

     var nca=$('#'+ca).val();
     var nexam=$('#'+exam).val();
     var total=parseInt(nca)+parseInt(nexam);
     var grade;
     var remark;
     if(total>100){
     	alert(total);

     }else{
     	if(total>=75){
     		grade='A';
     		}else if(total>=70){
     			grade='AB';
     		}else if(total>=65){
     			grade='B';
     		}else if(total>=60){
     			grade='BC';
     		}else if(total>=55){
     			grade='C';
     		}else if(total>=50){
     			grade='CD';
     		}else if(total>=45){
     			grade='D';
     		}else if(total>=40){
     			grade='E';
     		}else{
     			grade='F';
     		}
     		if(total>=40){
     			remark='PASS';
     		}else{
     			remark='FAIL';
     		}
 
     	$('#tdca'+ids).html(nca);
    $('#tdex'+ids).html(nexam);
    $('#tdt'+ids).html(total);
    $('#tdg'+ids).html(grade);
    $('#tdr'+ids).html(remark);

    $('.tdca').show();
    $('.tdex').show();

$('.ca').hide();
$('.ex').hide();
$('.save').hide();
ids=parseInt(ids);
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 $.ajax({
    url: '/update_uploads',
    type: 'GET',
    data: {_token: CSRF_TOKEN,nca:nca,nexam:nexam,total:total,grade:grade,remark:remark,ids:ids},     
    dataType: 'text', 
    beforeSend:function() {
  $('#load'+ids).show();
    },
	complete: function() {
		  $('#load'+ids).hide();
	},
 
    success: function (data) {

	alert(data);
	
     }
});
    
     }

	 
	


	//alert(nca);
});

$('.csa').keyup(function(){
	//var ids = $(this).attr("id");
	var ids = this.id.match(/\d+/); 	
	var ca='ca'+ids;	
	var exam='ex'+ids;
     
     var nca=$('#'+ca).val();
     var nexam=$('#'+exam).val();


	alert(nca);
});
 /*
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
      
   //  
    $('#dataTables-example').Tabledit({

      url: 'example.php',
      columns: {
        identifier: [0, 'id'],                   
        editable: [[4, 'Firstname'], [5, 'Lastname'], [6, 'Email']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus,jqXHR){
          if(data.action=="delete"){
              $('#'.data.id).remove();
          }
      }
    });
  */

    $("form#fgetreport").submit(function(event){
  event.preventDefault(); 
  var formData = new FormData($(this)[0]);
  
 $.ajax({
      
    url: $(this).attr('action'),
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,  
    success: function (data) {
 $('#reports').html(data);
 
  
     }
});
 
});


});



function loadStart() {
  $('.loader').show();
}
function loadStop() {
  $('.loader').hide();
}