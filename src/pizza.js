class Pizza {
    static PIZZA_TYPES = {
        "Маргарита": { price: 500, calories: 300 },
        "Пепперони": { price: 800, calories: 400 },
        "Баварская": { price: 700, calories: 450 },
    };
  
    static SIZE_TYPES = {
        "Большая": { price: 200, calories: 200 },
        "Маленькая": { price: 100, calories: 100 },
    };
  
    static TOPPINGS = {
        "сливочная моцарелла": { price: 50, calories: 20 },
        "сырный борт": { price_small: 150, price_large: 300, calories: 50 },
        "чедер и пармезан": { price_small: 150, price_large: 300, calories: 50 },
    };
  
    constructor(pizzaType, size) {
        this.pizzaType = pizzaType;
        this.size = size;
        this.toppings = [];
    }
  
    addTopping(topping) {
        if (!this.toppings.includes(topping)) {
            this.toppings.push(topping);
        }
    }
  
    removeTopping(topping) {
        const index = this.toppings.indexOf(topping);
        if (index !== -1) {
            this.toppings.splice(index, 1);
        }
    }
  
    calculatePrice() {
        const basePrice = Pizza.PIZZA_TYPES[this.pizzaType].price;
        const sizePrice = Pizza.SIZE_TYPES[this.size].price;
  
        let toppingsPrice = this.toppings.reduce((total, topping) => {
            if (topping === "сырный борт" || topping === "чедер и пармезан") {
                return total + (this.size === "Маленькая"
                    ? Pizza.TOPPINGS[topping].price_small
                    : Pizza.TOPPINGS[topping].price_large);
            } else {
                return total + Pizza.TOPPINGS[topping].price;
            }
        }, 0);
  
        return basePrice + sizePrice + toppingsPrice;
    }
  
    calculateCalories() {
        const baseCalories = Pizza.PIZZA_TYPES[this.pizzaType].calories;
        const sizeCalories = Pizza.SIZE_TYPES[this.size].calories;
  
        let toppingsCalories = this.toppings.reduce((total, topping) => total + Pizza.TOPPINGS[topping].calories, 0);
  
        return baseCalories + sizeCalories + toppingsCalories;
    }
}

function updateButtonPrices() {
    const pizzaType = document.getElementById('pizzaType').value;
    const size = document.getElementById('size').value;

    if (!pizzaType || !size) {
        document.getElementById('price').textContent = '0';
        document.getElementById('calories').textContent = '0';
        return;
    }

    const pizza = new Pizza(pizzaType, size);

    const toppingsCheckboxes = document.querySelectorAll('#toppingsDiv input[type=checkbox]');
    
    pizza.toppings = [];
    
    toppingsCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
            pizza.addTopping(checkbox.value);
        }
    });

    const totalPrice = pizza.calculatePrice();
    const totalCalories = pizza.calculateCalories();

    document.getElementById('price').textContent = totalPrice;
    document.getElementById('calories').textContent = totalCalories;
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('sizeDiv').classList.remove('hidden');
    document.getElementById('toppingsDiv').classList.remove('hidden');
    document.getElementById('calculateBtn').classList.remove('hidden');
    
    updateButtonPrices();
});

document.getElementById('pizzaType').addEventListener('change', updateButtonPrices);
document.getElementById('size').addEventListener('change', updateButtonPrices);

document.querySelectorAll('#toppingsDiv input[type=checkbox]').forEach(checkbox => {
    checkbox.addEventListener('change', updateButtonPrices);
});
