const Quantity = function() {
    const q = this;
    q.addBtn = document.querySelectorAll(".addBtn");
    q.subtractBtn = document.querySelectorAll(".subtractBtn");
    q.qtyDisplay = document.querySelectorAll(".qtyAmount");

    q.formElement = document.querySelectorAll(".adjustQty");

    q.quantity = [];

    q.init = function() {
        q.bindQtyFields();
    }

    q.bindQtyFields = function() {
        
        q.qtyDisplay.forEach((display, i) => {
            
            q.setAmount = function() {
                if(display.value == ""){
                    q.quantity[i] = 1;
                    display.value = q.quantity[i];
                    return display.value;
                } else {
                    q.quantity[i] = parseInt(display.value);
                    return q.quantity[i];
                }
            }
        
            q.add = function() {
                q.addBtn[i].addEventListener("click", function(e) {
                    if(!q.addBtn[i].classList.contains("sendOK")){
                        e.preventDefault();
                    } else if(q.quantity[i]>6){
                        e.preventDefault();
                    }
        
                    if(q.quantity[i]<6) {
                        q.quantity[i] = q.quantity[i]+1;
                        display.value = q.quantity[i];
                    }
                })
            }
        
            q.subtract = function() {
                q.subtractBtn[i].addEventListener("click", function(e) {
                    if(!q.subtractBtn[i].classList.contains("sendOK")){
                        e.preventDefault();
                    } else if(q.quantity[i]<1){
                        e.preventDefault();
                    }
                    if(q.quantity[i]>1){
                        q.quantity[i] = q.quantity[i] -1;
                        display.value = q.quantity[i];
                    }
                })
            }
            q.setAmount();
            q.add();
            q.subtract();
        })
    }

    q.init();
}