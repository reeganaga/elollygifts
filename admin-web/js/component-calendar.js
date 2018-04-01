/*! light-blue - v3.2.0 - 2015-10-05 */
$(function(){function a(){
	$("#external-events").find("div.external-event").each(function(){
		var a={title:$.trim($(this).text())};
		$(this).data("eventObject",a),
		$(this).draggable({zIndex:999,revert:!0,revertDuration:0})});

	var a=new Date,b=a.getDate(),c=a.getMonth(),d=a.getFullYear(),
	e=$("#calendar").fullCalendar({header:{left:"",center:"title",right:""},selectable:!0,selectHelper:!0,select:function(a,b,c){var d=$("#edit-modal"),f=$("#create-event");
	f.off("click"),f.click(function(){var 
		d=$("#event-name").val();
		d&&e.fullCalendar("renderEvent",{title:d,start:a,end:b,allDay:c,backgroundColor:"#64bd63",textColor:"#fff"},!0),e.fullCalendar("unselect")}),d.modal("show"),e.fullCalendar("unselect")},editable:!0,droppable:!0,drop:function(a,b){var c=$(this).data("eventObject"),
	d=$.extend({},c);
	d.start=a,d.allDay=b;
	var 
	e=$(this).data("event-class");
	e&&(d.className=[e]),$("#calendar").fullCalendar("renderEvent",d,!0),
	$(this).remove()},events:[
	
	{title:"All Day Event",start:new Date(d,c,1),backgroundColor:"#79A5F0",textColor:"#fff"},
	{title:"Long Event",start:new Date(d,c,b+5),end:new Date(d,c,b+7)},
	{id:999,title:"Repeating Event",start:new Date(d,c,b-3,17,0),allDay:!1},

	{title:"Click for Flatlogic",start:new Date(d,c,28),end:new Date(d,c,29),url:"http://flatlogic.com/",backgroundColor:"#e5603b",textColor:"#fff"}],
	eventClick:function(a){if(a.url)return window.open(a.url,"gcalevent","width=700,height=600"),!1;
	var b=$("#myModal"),c=$("#myModalLabel");
	c.html(a.title),b.find(".modal-body p").html(function(){return a.allDay?"All day event":"Start At: <strong>"+a.start._d.getHours()+":"+(0==a.start._d.getMinutes()?"00":a.start._d.getMinutes())+"</strong></br>"+(null==a.end?"":"End At: <strong>"+a.end._d.getHours()+":"+(0==a.end._d.getMinutes()?"00":a.end._d.getMinutes())+"</strong>")}()),b.modal("show")}});
	$("#calendar-switcher").find("label").click(function(){e.fullCalendar("changeView",$(this).find("input").val())}),$("#calender-prev").click(function(){e.fullCalendar("prev")}),$("#calender-next").click(function(){e.fullCalendar("next")}),$("#today").click(function(){e.fullCalendar("today")})}
a(),PjaxApp.onPageLoad(a)});