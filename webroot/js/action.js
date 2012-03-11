$(document).ready(function(){
       var Url = location.href;
       Variables = Url.split("/");
       if(Variables[3] == 'list'){ $('#list').addClass('on'); }
       else if(Variables[3] == 'about') { $('#about').addClass('on'); }
       else { $('#paste').addClass('on'); }

       $("#code").bind("keydown", function(e) { 
              pressedKey = e.charCode || e.keyCode || -1;
              if (pressedKey == 9) {
                     if (window.event) { 
                            window.event.cancelBubble = true;
                            window.event.returnValue = false;
                     } else { 
                            e.preventDefault();
                            e.stopPropagation();
                     }
                     if (this.createTextRange) { 
                            document.selection.createRange().text="\t";
                            this.onblur = function() { this.focus(); this.onblur = null; };
                     } else if (this.setSelectionRange) { 
                            start = this.selectionStart; 
                            end = this.selectionEnd;
                            this.value = this.value.substring(0, start) + "\t" + this.value.substr(end);
                            this.setSelectionRange(start + 1, start + 1);
                            this.scrollTop = this.scrollHeight;
                            this.focus();
                     }
                     return false;
              }
       });
       $("#FlashNotice").fadeIn("slow");
       
       $(".full_screen").toggle(
              function(){
                     $("#sub-content").hide();
                     $("#content").css("width", "100%");
                     $('span a').text('Compact screen');
              },
              function(){
                     $("#sub-content").show();
                     $("#content").css("width", "720px");
                     $('span a').text('Full screen');}
       );
       
       $("input[@name='patito2']").attr({value:"no se que pasa"});

});

function del(){
       $("#FlashNotice").fadeOut("slow", function() { 
              $("#FlashNotice").remove();
       });
}
    
function del_time(){
       setTimeout("del()",5000);
}

    
window.onload=del_time
    
   