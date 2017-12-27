  var modal_1 = document.getElementById('loginTable');
  var modal_2 = document.getElementById('registerTable');
       
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal_1) {
          modal_1.style.display = "none";
      }
      else if (event.target == modal_2) {
          modal_2.style.display = "none";
      }
  }

  function switchtable(event) {
    document.getElementById('loginTable').style.display="none";
    document.getElementById('registerTable').style.display="block";
  }