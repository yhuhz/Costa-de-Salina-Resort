var todayDate;
        var totalDays;
        var price;
        
        function dateToday() {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
            var yyyy = today.getFullYear();
            if(dd<10){
            dd='0'+dd
            } 
            if(mm<10){
            mm='0'+mm
            } 

            todayDate = yyyy+'-'+mm+'-'+dd;
            return today;
        }

        function minDateStart() {
            dateToday();
            document.getElementById("reservation_date").setAttribute("min", todayDate);
            document.getElementById("reservation_date").setAttribute("value", todayDate);
        }

        function maxDateStart() {
            var maxStart = new Date();
            var dd = maxStart.getDate();
            var mm = maxStart.getMonth()+3; //January is 0 so need to add 1 to make it 1!
            var yyyy = maxStart.getFullYear();
            if(dd<10){
            dd='0'+dd
            } 
            if(mm<10){
            mm='0'+mm
            } 

            maxStart = yyyy+'-'+mm+'-'+dd;
            document.getElementById("reservation_date").setAttribute("max", maxStart);
        }

        function dateNext() {
            var dateString = Date.parse(document.getElementById("reservation_date").value);

            
            var someDate = new Date(dateString);

            var nextMinDate = new Date(dateString);
            var dd = nextMinDate.getDate();
            var mm = nextMinDate.getMonth()+1; //January is 0 so need to add 1 to make it 1!
            var yyyy = nextMinDate.getFullYear();
            if(dd<10){
            dd='0'+dd
            } 
            if(mm<10){
            mm='0'+mm
            } 

            nextMinDate = yyyy+'-'+mm+'-'+dd;
            document.getElementById("end_date").setAttribute("min", nextMinDate);

            document.getElementById("end_date").setAttribute("value", nextMinDate);

            var maxDaysAdd = 6;
            var maxResult = someDate.setDate(someDate.getDate() + maxDaysAdd);
            
            var nextMaxDate = new Date(maxResult);
            var dd = nextMaxDate.getDate();
            var mm = nextMaxDate.getMonth()+1; //January is 0 so need to add 1 to make it 1!
            var yyyy = nextMaxDate.getFullYear();
            if(dd<10){
            dd='0'+dd
            } 
            if(mm<10){
            mm='0'+mm
            } 

            nextMaxDate = yyyy+'-'+mm+'-'+dd;
            document.getElementById("end_date").setAttribute("max", nextMaxDate);
        }

        function setPrice() {
          var package = document.getElementById("package").value;

          if (package == "Whole Resort") {
            document.getElementById("price").innerHTML = "Price: ₱15,000.00";
            price = 15000;
          } else if (package == "Big House") {
            document.getElementById("price").innerHTML = "Price: ₱10,000.00";
            price = 10000;
          } else if (package == "Small House (side)") {
            document.getElementById("price").innerHTML = "Price: ₱8,000.00";
            price = 8000;
          } else if (package == "Small House (back)") {
            document.getElementById("price").innerHTML = "Price: ₱6,000.00";
            price = 6000;
          } else if (package == "Resort Grounds") {
            document.getElementById("price").innerHTML = "Price: ₱5,000.00";
            price = 5000;
          } else {
            document.getElementById("price").innerHTML = "Price: ";
            price = 0;
          }

          return price;
        }

        minDateStart();
        maxDateStart();
        dateNext();
        setPrice();

        $(document).ready(function () {
        $("#reservation_date").change(dateNext);
        });

        $(document).ready(function () {
        $("#end_date").change(dateNext);
        });
        
        $(document).ready(function () {
        $("#package").change(setPrice);
        });

        function dateDiff() {
          var date1 = new Date(Date.parse(document.getElementById("reservation_date").value));
          var date2 = new Date(Date.parse(document.getElementById("end_date").value));

          var difference = date2.getTime() - date1.getTime();
          totalDays = Math.ceil(difference / (1000 * 3600 * 24));

          if (totalDays == 0) {
            totalDays = 1;
          }

          document.getElementById("days").innerHTML = "Number of days: " + totalDays;

          return totalDays;
        }

        dateDiff();
        
        $(document).ready(function () {
        $("#reservation_date").change(dateDiff);
        });

        $(document).ready(function () {
        $("#end_date").change(dateDiff);
        });

        function totalCost() {
          var cost;

          if (totalDays < 0 || price <= 0) {
            document.getElementById("totalCost").innerHTML = "Invalid selection!";
            document.getElementById("book_btn").disabled=true;
            document.getElementById("book_btn").style.backgroundColor="grey";
            document.getElementById("book_btn").style.color="white";
          } else if (totalDays > 7) {
            document.getElementById("totalCost").innerHTML = "I'm sorry but you reservation dates." + "<br/>" + "cannot exceed 7 days.";
            document.getElementById("book_btn").disabled=true;
            document.getElementById("book_btn").style.backgroundColor="grey";
            document.getElementById("book_btn").style.color="white";
          } else {
            cost = totalDays * price;
            var commas = cost.toLocaleString("en-US");
            document.getElementById("totalCost").innerHTML = "The total cost for your stay" + "<br/>" + "will be ₱" + commas;
            document.getElementById("book_btn").disabled=false;
            document.getElementById("book_btn").style.backgroundColor="#0061A8";
            document.getElementById("book_btn").style.color="white";
          }
        }

        totalCost();
        $(document).ready(function () {
        $("#end_date").change(totalCost);
        });

        $(document).ready(function () {
        $("#reservation_date").change(totalCost);
        });
        
        $(document).ready(function () {
        $("#package").change(totalCost);
        });