// faq

let faq = document.querySelectorAll('.faq_block');

if (faq) {
    faq.forEach(item => {
        item.addEventListener('click', () => {
            item.classList.toggle('active');
        });
    });
}


// select

let select = document.querySelectorAll('.select');

select.forEach((item, i) => {
    const selectShowWrapper = item.querySelector('.select-show__wrapper');

    selectShowWrapper.addEventListener('click', (event) => {
        event.stopPropagation();

        const selectList = item.querySelector('.select-list');

        selectList.classList.toggle('active');
    });

    item.querySelectorAll('.select-list p').forEach(element => {
        element.addEventListener('click', () => {
            item.querySelector('.select-list').classList.remove('active');
            if (i == 0) {
                document.querySelector('#giveCurrency').value = element.textContent;
            } else if (i == 1) {
                document.querySelector('#receiveCurrency').value = element.textContent;
            } else if (i == 2) {
                document.querySelector('#location').value = element.textContent;
            }
            calculateExchange();
        });
    });
});

document.querySelector('#main-order').addEventListener('input', () => {
    calculateExchange();
});



function calculateExchange() {
    let giveCurrency = document.querySelector('#giveCurrency').value;
    let receiveCurrency = document.querySelector('#receiveCurrency').value;
    
    fetch(`https://min-api.cryptocompare.com/data/price?fsym=${giveCurrency}&tsyms=${receiveCurrency}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Network response was not ok: ${response.statusText}`);
            }
            return response.json();
        })
        .then(data => {
            let countValue = +document.querySelector('#giveInput').value;
            let exchangeRate = data[receiveCurrency];

           
            fetch('./function/order/coefJson.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(coefficients => {
                    let selectedCurrency = coefficients.find(currency => currency.name === receiveCurrency);
                    let coefficient = selectedCurrency ? parseFloat(selectedCurrency.coefficient) : 1;

                    let finalResult = (countValue * exchangeRate * coefficient).toFixed(1);
                    document.querySelector('#receiveInput').value = finalResult;

                    document.querySelector('#advertising').innerHTML = `Курс обміну 1 ${giveCurrency} = ${((exchangeRate*coefficient).toFixed(2)) + ' ' + receiveCurrency}`;
                })
                .catch(error => {
                    console.error('Помилка при отриманні даних:', error);
                });
        })
        .catch(error => {
            console.error('Помилка запиту:', error);
        });
}


fetch('./function/order/coefJson.php')
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
      
       
    })
    .catch(error => console.error('Помилка при отриманні даних:', error));


calculateExchange();



var nameInput = document.querySelector('input[name="name"]');
    var phoneInput = document.querySelector('input[name="phone"]');

    nameInput.addEventListener("input", function () {
        var nameValue = this.value.trim();
        var nameRegex = /^[a-zA-Zа-яА-ЯІіЇїЄєҐґ]{2,20}$/;

        if (nameRegex.test(nameValue)) {
            this.classList.remove("invalid");
        } else {
            this.classList.add("invalid");
        }
    });

    phoneInput.addEventListener("input", function () {
        var phoneValue = this.value.replace(/\D/g, ''); 
        var phoneRegex = /^\+?\d{9,15}$/; 

        if (phoneRegex.test(phoneValue)) {
            this.classList.remove("invalid");
        } else {
            this.classList.add("invalid");
        }
    });

    document.querySelector('#main-order').addEventListener("submit", function (e) {
        var nameValue = nameInput.value.trim();
        var phoneValue = phoneInput.value.replace(/\D/g, ''); 
        var nameRegex = /^[a-zA-Zа-яА-ЯІіЇїЄєҐґ]{2,20}$/;
        var phoneRegex = /^\+?\d{7,15}$/;

        if (!nameRegex.test(nameValue)) {
            e.preventDefault(); 
        } else if (!phoneRegex.test(phoneValue)) {
            e.preventDefault(); 
            alert('Введіть коректний номер телефону.');
        }
    });