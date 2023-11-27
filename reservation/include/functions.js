function openModal(base64Image) {
    // Get the modal element
    var bigPicCon = document.getElementById('bigPIC_container');

    // Set the image and caption in the modal
    var selectedImg = document.getElementById("bigPIC");
    selectedImg.src = 'data:image/jpeg;base64,' + base64Image;

    // Display the modal
    bigPicCon.style.display = "flex";

    // Close the modal when the user clicks outside the image
    bigPicCon.onclick = function () {
        bigPicCon.style.display = "none";
    };
}
function openModal2(base64Image) {
    // Get the modal element
    var bigPicCon = document.getElementById('bigPIC_container1');

    // Set the image and caption in the modal
    var selectedImg = document.getElementById("bigPIC1");
    selectedImg.src = 'data:image/jpeg;base64,' + base64Image;

    // Display the modal
    bigPicCon.style.display = "flex";

    // Close the modal when the user clicks outside the image
    bigPicCon.onclick = function () {
        bigPicCon.style.display = "none";
    };
}

function changeContent(contentId, activeButtonId) {
    // Hide all card-bodies
    document.getElementById('studHome_Main').style.display = 'none';
    document.getElementById('studHome_ItemList').style.display = 'none';
    document.getElementById('studHome_Logout').style.display = 'none';

    // Remove active class from all buttons
    document.getElementById('pills-home-tab').classList.remove('active');
    document.getElementById('pills-profile-tab').classList.remove('active');
    document.getElementById('pills-contact-tab').classList.remove('active');

    // Show the selected card-body
    document.getElementById(contentId).style.display = 'block';

    // Add active class to the clicked button
    document.getElementById(activeButtonId).classList.add('active');
}

function calculatePrice(price) {
    //var base = price;
    var quantity = parseInt(document.getElementById("quantity").value);

    if (quantity !== null && quantity > 0) {
        var total = quantity * price;
        document.getElementById("price").value = total;
    } else {
        document.getElementById("quantity").value = '';
        document.getElementById("price").value = 0;
    }
}

function logoutMes() {
    var confirmLogout = confirm("Are you sure you want to logout?");
    if (confirmLogout) {
        // Redirect to the logout page if the user clicks "OK"
        window.location.href = 'studlogin.php';
    } else {
        // Do nothing if the user clicks "Cancel"
    }
}

function doPrint(){
    let doc = document.getElementById(name);
        window.print();
}

function changeNote(id,newsstatus,notes){
    let status = document.getElementById("2ndpara");
    status.innerText = "";
    status.classList.remove("btn-danger");
    status.classList.remove("btn-warning");
    status.classList.remove("btn-success");
    status.classList.remove("btn-secondary");

    document.getElementById("3rdpara").innerText = "";

    document.getElementById("2ndpara").innerText = newsstatus;
    document.getElementById("3rdpara").innerText = notes;

    if(newsstatus == "accepted"){
        status.classList.add("btn-success");
    }else if(newsstatus == "canceled"){
        status.classList.add("btn-danger");
    }else if(newsstatus == "pending"){
        status.classList.add("btn-warning");
    }else{
        status.classList.add("btn-secondary");
    }
}

function sendNote(id){

    //create note and fetch datas on button click
    document.getElementById('hiddenid').value = "";
    document.getElementById('createNote').style.display = "block";
    document.getElementById('hiddenid').value = id;

    // document.getElementById('btnAccept').classList.remove('btn-success');
    // document.getElementById('btnCancel').classList.remove('btn-danger');
    // document.getElementById('btnPending').classList.remove('btn-warning');
    // document.getElementById('btnNostock').classList.remove('btn-secondary');
    // document.getElementById('btnPending').classList.add('btn-outline-warning');
   

    // //for button status coloring
    //  if(status == 'Accept'){
    //     document.getElementById('btnAccept').classList.add('btn-success');
    //     document.getElementById('btnCancel').classList.remove('btn-danger');
    //     document.getElementById('btnPending').classList.remove('btn-warning');
    //     document.getElementById('btnNostock').classList.remove('btn-secondary');
    //  }else if(status == 'Pending'){
    //     document.getElementById('btnAccept').classList.remove('btn-success');
    //     document.getElementById('btnCancel').classList.remove('btn-danger');
    //     document.getElementById('btnPending').classList.add('btn-warning');
    //     document.getElementById('btnNostock').classList.remove('btn-secondary');
    //  }
    //  else if(status == 'Cancel'){
    //     document.getElementById('btnAccept').classList.remove('btn-success');
    //     document.getElementById('btnCancel').classList.add('btn-danger');
    //     document.getElementById('btnPending').classList.remove('btn-warning');
    //     document.getElementById('btnNostock').classList.remove('btn-secondary');
    //  }
    //  else if(status == 'Nostock'){
    //     document.getElementById('btnAccept').classList.remove('btn-success');
    //     document.getElementById('btnCancel').classList.remove('btn-danger');
    //     document.getElementById('btnPending').classList.remove('btn-warning');
    //     document.getElementById('btnNostock').classList.add('btn-secondary');
    //  }
   
 }
 

 function closeNote(){
    document.getElementById('createNote').style.display = "none";
 }