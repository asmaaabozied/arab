

$(document).ready( function () {
    $(function() {

        $('.btn-link[aria-expanded="true"]').closest('.accordion-item').addClass('active');
      $('.collapse').on('show.bs.collapse', function () {
          $(this).closest('.accordion-item').addClass('active');
        });
    
      $('.collapse').on('hidden.bs.collapse', function () {
          $(this).closest('.accordion-item').removeClass('active');
        });
    
        
    
    });
    

    $('.lang').on('click',function(e){
        e.preventDefault();
        var link1="../bootstrap-5.0.2/dist/css/bootstrap.min.css";
        var link2="../css/ltr.css";
        var link3="../bootstrap-5.0.2/dist/css/bootstrap.rtl.min.css";
        var link4='../css/rtl.css'
       if( $('#bootstrap').attr('href')  == link3  ||  $('#rtl').attr('href') == link4){
        $('#bootstrap').attr("href", link1);
        
        $('#rtl').attr("href", link2);
        
       }
       else if( $('#bootstrap').attr("href") == link1  ||   $('#rtl').attr("href") ==  link2){
        $('#bootstrap').attr("href", link3);
        
        $('#rtl').attr("href", link4);
       
       }
    })
    $('.dark').click(function(event){
        var darkmode="../css/dark.css";
        var lightmode="../css/light.css";
       
       if( $('#light').attr('href')  == darkmode ){
       
        
        $('#light').attr("href", lightmode);
        
       }
       else if( $('#light').attr("href") == lightmode  ){
        $('#light').attr("href", darkmode);
        
        
       }
    })
  $('#PrivilageRuler').DataTable({
    
    "ordering": false,  
    "info": false,
    "autoWidth": true,
			"fixedHeader": true,
    "lengthChange": false ,
    "language": {
      "loadingRecords": "جارٍ التحميل...",
      "lengthMenu": "أظهر _MENU_ مدخلات",
      "zeroRecords": "لم يعثر على أية سجلات",
      "info": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
      "search": "ابحث:",
      "paginate": {
          "first": "الأول",
          "previous": "السابق",
          "next": "التالي",
          "last": "الأخير"
      },
      "aria": {
          "sortAscending": ": تفعيل لترتيب العمود تصاعدياً",
          "sortDescending": ": تفعيل لترتيب العمود تنازلياً"
      },
      "select": {
          "rows": {
              "_": "%d قيمة محددة",
              "1": "1 قيمة محددة"
          },
          "cells": {
              "1": "1 خلية محددة",
              "_": "%d خلايا محددة"
          },
          "columns": {
              "1": "1 عمود محدد",
              "_": "%d أعمدة محددة"
          }
      },
      "buttons": {
          "print": "طباعة",
          "copyKeys": "زر <i>ctrl<\/i> أو <i>⌘<\/i> + <i>C<\/i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
          "pageLength": {
              "-1": "اظهار الكل",
              "_": "إظهار %d أسطر",
              "1": "اظهار سطر واحد"
          },
          "collection": "مجموعة",
          "copy": "نسخ",
          "copyTitle": "نسخ إلى الحافظة",
          "csv": "CSV",
          "excel": "Excel",
          "pdf": "PDF",
          "colvis": "إظهار الأعمدة",
          "colvisRestore": "إستعادة العرض",
          "copySuccess": {
              "1": "تم نسخ سطر واحد الى الحافظة",
              "_": "تم نسخ %ds أسطر الى الحافظة"
          },
          "createState": "تكوين حالة",
          "removeAllStates": "ازالة جميع الحالات",
          "removeState": "ازالة حالة",
          "renameState": "تغيير اسم حالة",
          "savedStates": "الحالات المحفوظة",
          "stateRestore": "استرجاع حالة",
          "updateState": "تحديث حالة"
      },
      "searchBuilder": {
          "add": "اضافة شرط",
          "clearAll": "ازالة الكل",
          "condition": "الشرط",
          "data": "المعلومة",
          "logicAnd": "و",
          "logicOr": "أو",
          "value": "القيمة",
          "conditions": {
              "date": {
                  "after": "بعد",
                  "before": "قبل",
                  "between": "بين",
                  "empty": "فارغ",
                  "equals": "تساوي",
                  "notBetween": "ليست بين",
                  "notEmpty": "ليست فارغة",
                  "not": "ليست "
              },
              "number": {
                  "between": "بين",
                  "empty": "فارغة",
                  "equals": "تساوي",
                  "gt": "أكبر من",
                  "lt": "أقل من",
                  "not": "ليست",
                  "notBetween": "ليست بين",
                  "notEmpty": "ليست فارغة",
                  "gte": "أكبر أو تساوي",
                  "lte": "أقل أو تساوي"
              },
              "string": {
                  "not": "ليست",
                  "notEmpty": "ليست فارغة",
                  "startsWith": " تبدأ بـ ",
                  "contains": "تحتوي",
                  "empty": "فارغة",
                  "endsWith": "تنتهي ب",
                  "equals": "تساوي",
                  "notContains": "لا تحتوي",
                  "notStartsWith": "لا تبدأ بـ",
                  "notEndsWith": "لا تنتهي بـ"
              },
              "array": {
                  "equals": "تساوي",
                  "empty": "فارغة",
                  "contains": "تحتوي",
                  "not": "ليست",
                  "notEmpty": "ليست فارغة",
                  "without": "بدون"
              }
          },
          "button": {
              "0": "فلاتر البحث",
              "_": "فلاتر البحث (%d)"
          },
          "deleteTitle": "حذف فلاتر",
          "leftTitle": "محاذاة يسار",
          "rightTitle": "محاذاة يمين",
          "title": {
              "0": "البحث المتقدم",
              "_": "البحث المتقدم (فعال)"
          }
      },
      "searchPanes": {
          "clearMessage": "ازالة الكل",
          "collapse": {
              "0": "بحث",
              "_": "بحث (%d)"
          },
          "count": "عدد",
          "countFiltered": "عدد المفلتر",
          "loadMessage": "جارِ التحميل ...",
          "title": "الفلاتر النشطة",
          "showMessage": "إظهار الجميع",
          "collapseMessage": "إخفاء الجميع",
          "emptyPanes": "لا يوجد مربع بحث"
      },
      "infoThousands": ",",
      "datetime": {
          "previous": "السابق",
          "next": "التالي",
          "hours": "الساعة",
          "minutes": "الدقيقة",
          "seconds": "الثانية",
          "unknown": "-",
          "amPm": [
              "صباحا",
              "مساءا"
          ],
          "weekdays": [
              "الأحد",
              "الإثنين",
              "الثلاثاء",
              "الأربعاء",
              "الخميس",
              "الجمعة",
              "السبت"
          ],
          "months": [
              "يناير",
              "فبراير",
              "مارس",
              "أبريل",
              "مايو",
              "يونيو",
              "يوليو",
              "أغسطس",
              "سبتمبر",
              "أكتوبر",
              "نوفمبر",
              "ديسمبر"
          ]
      },
      "editor": {
          "close": "إغلاق",
          "create": {
              "button": "إضافة",
              "title": "إضافة جديدة",
              "submit": "إرسال"
          },
          "edit": {
              "button": "تعديل",
              "title": "تعديل السجل",
              "submit": "تحديث"
          },
          "remove": {
              "button": "حذف",
              "title": "حذف",
              "submit": "حذف",
              "confirm": {
                  "_": "هل أنت متأكد من رغبتك في حذف السجلات %d المحددة؟",
                  "1": "هل أنت متأكد من رغبتك في حذف السجل؟"
              }
          },
          "error": {
              "system": "حدث خطأ ما"
          },
          "multi": {
              "title": "قيم متعدية",
              "restore": "تراجع",
              "info": "القيم المختارة تحتوى على عدة قيم لهذا المدخل. لتعديل وتحديد جميع القيم لهذا المدخل، اضغط او انتقل هنا، عدا ذلك سيبقى نفس القيم",
              "noMulti": "هذا المدخل مفرد وليس ضمن مجموعة"
          }
      },
      "processing": "جارٍ المعالجة...",
      "emptyTable": "لا يوجد بيانات متاحة في الجدول",
      "infoEmpty": "يعرض 0 إلى 0 من أصل 0 مُدخل",
      "thousands": ".",
      "stateRestore": {
          "creationModal": {
              "columns": {
                  "search": "إمكانية البحث للعمود",
                  "visible": "إظهار العمود"
              },
              "toggleLabel": "تتضمن",
              "button": "تكوين الحالة",
              "name": "اسم الحالة",
              "order": "فرز",
              "paging": "تصحيف",
              "scroller": "مكان السحب",
              "search": "بحث",
              "searchBuilder": "مكون البحث",
              "select": "تحديد",
              "title": "تكوين حالة جديدة"
          },
          "duplicateError": "حالة مكررة بنفس الاسم",
          "emptyError": "لا يسمح بأن يكون اسم الحالة فارغة.",
          "emptyStates": "لا توجد حالة محفوظة",
          "removeConfirm": "هل أنت متأكد من حذف الحالة %s؟",
          "removeError": "لم استطع ازالة الحالة.",
          "removeJoiner": "و",
          "removeSubmit": "حذف",
          "removeTitle": "حذف حالة",
          "renameButton": "تغيير اسم حالة",
          "renameLabel": "الاسم الجديد للحالة %s:",
          "renameTitle": "تغيير اسم الحالة"
      },
      "autoFill": {
          "cancel": "إلغاء الامر",
          "fill": "املأ كل الخلايا بـ <i>%d<\/i>",
          "fillHorizontal": "تعبئة الخلايا أفقيًا",
          "fillVertical": "تعبئة الخلايا عموديا",
          "info": "تعبئة تلقائية"
      },
      "decimal": ",",
      "infoFiltered": "(مرشحة من مجموع _MAX_ مُدخل)",
      "searchPlaceholder": "مثال بحث"
  
     
  },
  "bDestroy": true
  
   
}); 
$(".progress-bar").loading();

})

if(window.screen.width  < 600){
  $('.sidebar-data').addClass('collapse')
  $('.sidebar-data').attr('id' ,'homeSubmenu1')

}
else{
  $('.sidebar-data').removeClass('collapse')
  $('.sidebar-data').attr('id' ,'')

}
function toggleOn() {
    $('#toggle-trigger').bootstrapToggle('on')
  }
function openNav() {
  document.getElementById("sidebar").style.display = "block";
 
}

function closeNav() {
  document.getElementById("sidebar").style.display = "none";
 

}
$(function(){ 
    $("#fileUpload").fileUpload();
  });