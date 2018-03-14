/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
	
    for (i = 0; i < a.length; i++) {
        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
			
        } else {
            a[i].style.display = "none";
        }
    }
}

window.onhashchange = changeFunction();

function changeFunction() {
    document.getElementById("selectedName").innerHTML = window.location.hash.substring(1);
	cleanFunction();
}

/* document.getElementById("demos").innerHTML = window.location.hash.substring(1); */

function cleanFunction() {
			$.ajax({
				url: 'cleaner.php',             
				data: "",                      
				dataType: 'json',              
				success: function(data)    
				{
					
					
				} 
			});   
}		