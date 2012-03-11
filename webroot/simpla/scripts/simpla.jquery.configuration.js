$(document).ready(function(){
	
    //Minimize Content Box
		
		$(".content-box-header h3").css({ "cursor":"s-resize" }); // Give the h3 in Content Box Header a different cursor
		$(".content-box-header-toggled").next().hide(); // Hide the content of the header if it has the class "content-box-header-toggled"
		
		$(".content-box-header h3").click( // When the h3 is clicked...
			function () {
			  $(this).parent().parent().find(".content-box-content").toggle(); // Toggle the Content Box
			  $(this).parent().toggleClass("content-box-header-toggled"); // Give the Content Box Header a special class for styling and hiding
			  $(this).parent().find(".content-box-tabs").toggle(); // Toggle the tabs
			}
		);

    // Content box tabs:
		
		$('.content-box .content-box-content div.tab-content').hide(); // Hide the content divs
		$('.content-box-content div.default-tab').show(); // Show the div with class "default-tab"
		$('ul.content-box-tabs li a.default-tab').addClass('current'); // Set the class of the default tab link to "current"
		
		$('.content-box ul.content-box-tabs li a').click( //When a tab is clicked...
			function() { 
				$(this).parent().siblings().find("a").removeClass('current'); // Remove "current" class from all tabs
				$(this).addClass('current'); // Add class "current" to clicked tab
				var currentTab = $(this).attr('href'); // Set variable "currentTab" to the value of href of clicked tab
				$(currentTab).siblings().hide(); // Hide all content divs
				$(currentTab).show(); // Show the content div with the id equal to the id of clicked tab
				return false; 
			}
		);
		
		$('.tabs a').click( //When a tab is clicked...
			function() {
				$("#new_paste").removeClass('current');
				$("#list_paste").removeClass('current');
				$("#"+$(this).attr("rel")).addClass('current');
				var currentTab = $(this).attr('href'); // Set variable "currentTab" to the value of href of clicked tab
				$(currentTab).siblings().hide(); // Hide all content divs
				$(currentTab).show(); // Show the content div with the id equal to the id of clicked tab
				return false; 
			}
		);

    //Close button:
		
		$(".close").click(
			function () {
				$(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
					$(this).slideUp(600);
				});
				return false;
			}
		);

    // Alternating table rows:
		
		$('tbody tr:even').addClass("alt-row"); // Add class "alt-row" to even table rows

    // Initialise Facebox Modal window:
		
		$('a[rel*=modal]').facebox(); // Applies modal window to any link with attribute rel="modal"
		
		// paste code javascript
		$("#super_campo_que_debe_esta_escondido2").attr({value:"no se que pasa"});
		
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
			$('.pagination > a').live('click', function(){

			//alert($(this).attr('href'));
			if($(this).attr('href') != "#"){
			$.ajax({ url: $(this).attr('href'),
				success: function(html){
					//$("#tr_"+parseInt(html)).remove();
					$(".list_code").empty();
					$(".list_code").append(html);
					$('.list_code tbody tr:even').addClass("alt-row");
					//alert(html);
				}
			});
			}
				return false;
			
			});

});
  
  
  