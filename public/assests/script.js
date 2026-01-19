document.addEventListener("DOMContentLoaded", function () {
  const button = document.querySelectorAll(".qtn-btn");
  button.forEach((btn) => {
    btn.addEventListener("click", function () {
      const CardId = this.dataset.id;
      const actions = this.dataset.action;
      //   console.log("Hello Every One"  , );
      const form = new FormData();
      form.append("ids", CardId);
      form.append("action", actions);
      fetch("../app/controllers/quantitycontroller.php", {
        method: "POST",
        body: form,
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.status < 2) {
            document.getElementById("min1-" + CardId).disabled = true;
          } else {
            document.getElementById("min1-" + CardId).disabled = false;
          }
          document.getElementById("qtnt-" + CardId).innerHTML = data.status;
          document.getElementById("totalprice1").innerHTML = data.price;
          document.getElementById("totalp").innerHTML = data.price;
        });
    });
  });
  const button2 = document.querySelectorAll(".qtn2-btn");
  button2.forEach((btn) => {
    btn.addEventListener("click", function () {
      const CardId = this.dataset.id;
      const actions = this.dataset.action;
      //   console.log("Hello Every One"  , );
      const form = new FormData();
      form.append("ids", CardId);
      form.append("action", actions);
      fetch("../app/controllers/quantitycontroller.php", {
        method: "POST",
        body: form,
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.status < 2) {
            document.getElementById("min-" + CardId).disabled = true;
          } else {
            document.getElementById("min-" + CardId).disabled = false;
          }
          document.getElementById("qtn-" + CardId).innerHTML = data.status;

          document.getElementById("totalprice").innerHTML = data.price;
        });
    });
  });
  const removebtn = document.querySelectorAll(".qtn-rem");
  removebtn.forEach((btn) => {
    btn.addEventListener("click", function () {
      if (confirm("If you Want Remove This product Cart")) {
        //   console.log("Hello Every One");
        const id = this.dataset.id;
        //   console.log(id);
        const form = new FormData();
        form.append("id", id);
        fetch("../app/controllers/cartremcontroller.php", {
          method: "POST",
          body: form,
        })
          .then((res) => res.json())
          .then((data) => {
            console.log(data);
            if (data.status === "success") {
              const card2 = document.getElementById("card-" + id);
              card2.style.display = "none";
              document.getElementById("totalprice").innerHTML = data.price;
              const card3 = document.getElementById("card1-" + id);
              card3.style.display = "none";
              document.getElementById("totalprice1").innerHTML = data.price;
              document.getElementById("totalp").innerHTML = data.price;
            }
          });
      }
    });
  });
  const removebtn1 = document.querySelectorAll(".qtn1-rem");
  removebtn1.forEach((btn) => {
    btn.addEventListener("click", function () {
      if (confirm("If you Want Remove This product Cart")) {
        const id = this.dataset.id;
        const form = new FormData();
        form.append("id", id);
        fetch("../app/controllers/cartremcontroller.php", {
          method: "POST",
          body: form,
        })
          .then((res) => res.json())
          .then((data) => {
            console.log(data);
            if (data.status === "success") {
              const card2 = document.getElementById("card-" + id);
              card2.style.display = "none";
              document.getElementById("totalprice").innerHTML = data.price;
            }
          });
      }
    });
  });
  const orderbtn3 = document.querySelectorAll(".AddToCart");
  orderbtn3.forEach((btn) => {
    btn.addEventListener("click", function () {
      const from = new FormData();
      from.append("id",btn.id);
      console.log();
      fetch("../app/controllers/addtocardcontroller.php", {
        method: "post",
        body: from,
      })
        .then((res) => res.json())
        .then((data) => {
          console.log(data);
        });
    });
  });
  const token = document.querySelectorAll("#Token");
  token.forEach((btn) => {
    btn.addEventListener("submit", function (e) {
      e.preventDefault();
      const form = new FormData(this);
      fetch("../app/controllers/tokencreatecontroller.php", {
        method: "post",
        body: form,
      })
        .then((res) => res.json())
        .then((data) => {
          console.log(data);
          if (data.status == "Error") {
            document.getElementById("error").innerHTML = data.message;
          }
          if (data.status == "success") {
            alert("token are created");
            window.location.href = "index.php";
          }
        });
    });
  });
  const tokenclaim = document.querySelectorAll("#checkToken");
  tokenclaim.forEach((btn) => {
    btn.addEventListener("submit", function (e) {
      e.preventDefault();
      //  console.log("Hello Every One");
      const form = new FormData(this);
      console.log(form);
      fetch("../app/controllers/couponcheckController.php", {
        method: "POST",
        body: form,
      })
        .then((res) => res.json())
        .then((data) => {
          // console.log(data);
          if (data.status == "Error") {
            console.log(data.message);
            document.getElementById("error").innerHTML = data.message;
          } else if (data.status == "success") {
            document.getElementById("withtoken").innerHTML = "Price With Token";
            document.getElementById("totalp").innerHTML = data.price;
          }
        });
    });
  });
  // function paytmonsubmit(){
  const orderbtn = document.querySelectorAll("#paytmonsubmit");
   orderbtn.forEach((btn)=>{
    btn.addEventListener("click",function(e){
    //  console.log("Hello Every One ");
    let totalprice = document.getElementById("totalp").innerHTML;
    document.getElementById("paytm_amount").value = totalprice;
    // console.log(totalprice);
     document.getElementById("paytm_form").submit();
    })
   })
});
