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
          // console.log(data.status);
          document.getElementById("qtn-" + CardId).innerHTML = data.status;
          document.getElementById("qtnt-" + CardId).innerHTML = data.status;
          document.getElementById("totalprice").innerHTML = data.price;
          document.getElementById("totalprice1").innerHTML = data.price;
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
              // console.log(style);
              card2.style.display = "none";
              const card3 = document.getElementById("card1-" + id);
              // console.log(style);
              card3.style.display = "none";
              document.getElementById("totalprice").innerHTML = data.price;
              document.getElementById("totalprice1").innerHTML = data.price;
            }
          });
      }
    });
  });
  const orderbtn = document.querySelectorAll(".place-order");
  orderbtn.forEach((btn) => {
    btn.addEventListener("click", function () {
      console.log("Hello Every one");
      fetch("../app/contollers/ordercontroller.php");   
    });
  });
});
