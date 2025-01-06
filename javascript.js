const searchicon1 = document.querySelector('#searchicon1');
const srchicon1= document.querySelector('#srchicon1');
const search1=document.querySelector('#searchinput1');

searchicon1.addEventListener('click', function(){
    search1.style.display='flex';
    searchicon1.style.display='none';
})
const searchicon2 = document.querySelector('#searchicon2');
const srchicon2= document.querySelector('#srchicon2');
const search2=document.querySelector('#searchinput2');

searchicon2.addEventListener('click', function(){
    search2.style.display='flex';
    searchicon2.style.display='none';
})

const bar=document.querySelector('.fa-bars');
const cross= document.querySelector('#hdcross');
const headerbar=document.querySelector('.headerbar');

bar.addEventListener('click', function(){
    setTimeout(() => {
        cross.style.display='block';
    },200);
    headerbar.style.right='0%';
})

cross.addEventListener('click', function(){
    cross.style.display='none';
    headerbar.style.right='-100%';
})
cross.addEventListener('click', function(){
    cross.style.display='none';
})
let total = 0;
//add item from menu page
function addToOrder(itemName, itemPrice) {
    const ordersList = document.getElementById('orders-list');

    // Create a new list item
    const listItem = document.createElement('li');
    listItem.textContent = `${itemName} - $${itemPrice}`;

    // Append the list item to the orders list
    ordersList.appendChild(listItem);

    updateTotalPrice(parseInt(itemPrice, 10));

    // Update the total price
    total += itemPrice;
    document.getElementById('total-price').textContent = `Total: $${total}`;

    // Update the order list and final bill
    updateOrderList();

}
// alert msg
function addToOrder(itemName, itemPrice) {
    let orders = JSON.parse(localStorage.getItem('orders')) || [];
    orders.push({ name: itemName, price: itemPrice });
    localStorage.setItem('orders', JSON.stringify(orders));
    alert(`${itemName} added to your order!`);
}
function addItem() {
    const select = document.getElementById('food-item');
    const selectedItem = select.value;

    if (selectedItem !== '-') {
        const [itemName, itemPrice] = selectedItem.split('|');
        const itemPriceFloat = parseFloat(itemPrice);

        let orders = JSON.parse(localStorage.getItem('orders')) || [];
        orders.push({ name: itemName, price: itemPriceFloat });
        localStorage.setItem('orders', JSON.stringify(orders));

        updateOrderList();
        updateTotalPrice(itemPriceFloat); // Add the price to the total
    }
}

function updateOrderList() {
    const ordersList = document.getElementById('orders-list');
    const totalPriceElement = document.getElementById('total-price');

    ordersList.innerHTML = ''; // Clear current list
    let orders = JSON.parse(localStorage.getItem('orders')) || [];
    let total = 0;

    orders.forEach((order, index) => {
        const listItem = document.createElement('li');
        listItem.textContent = `${index + 1}. ${order.name} - ₹${order.price.toFixed(2)}`;

        // Create a close button
        const closeButton = document.createElement('span');
        closeButton.textContent = ' ×';
        closeButton.style.cursor = 'pointer';
        closeButton.style.color = 'red';
        closeButton.onclick = function () {
            removeOrder(index);
        };

        listItem.appendChild(closeButton);
        ordersList.appendChild(listItem);

        total += order.price;
    });

    totalPriceElement.textContent = `Total: ₹${total.toFixed(2)}`;
    updateFinalBill(total);
}

function removeOrder(index) {
    let orders = JSON.parse(localStorage.getItem('orders')) || [];
    orders.splice(index, 1); // Remove the item
    localStorage.setItem('orders', JSON.stringify(orders));
    updateOrderList(); // Refresh the list and totals
}

function updateTotalPrice(amount) {
    let currentTotal = parseFloat(document.getElementById('total-price').textContent.replace('Total: ₹', ''));
    currentTotal += amount;
    document.getElementById('total-price').textContent = `Total: ₹${currentTotal.toFixed(2)}`;
    updateFinalBill(currentTotal);
}
function clearOrders() {
    localStorage.removeItem('orders'); // Clear orders from storage
    document.getElementById('orders-list').innerHTML = ''; // Clear the list in UI
    document.getElementById('total-price').textContent = 'Total: ₹0';
    document.getElementById('billing-total-price').textContent = 'Total: ₹0';
    updateFinalBill(0);
}

function updateFinalBill(currentTotal) {
    const gstAmount = parseFloat(document.getElementById('gst-amount').getAttribute('value'));
    const deliveryFee = parseFloat(document.getElementById('delivery-amount').getAttribute('value'));

    const finalBillAmount = currentTotal + gstAmount + deliveryFee;
    document.getElementById('final-bill').textContent = `Final Bill: ₹${finalBillAmount.toFixed(2)}`;
}
function proceedToCheckout() {
    // Get the final bill amount from the displayed text
    const finalBillText = document.getElementById('final-bill').textContent;
    const finalBillAmount = finalBillText.replace('Final Bill: ₹', '').trim();

    // Store the final bill amount in local storage
    localStorage.setItem('finalBillAmount', finalBillAmount);

    // Redirect to the order confirmation page
    window.location.href = 'order_confirm.html';
}
function loadOrders() {
    updateOrderList(); // This will initialize and load the orders
}


window.onload = loadOrders;


// Get the view-orders-link element
const viewOrdersLink = document.querySelector('.view-orders-link');

// Initially hide the view-orders-link
viewOrdersLink.style.display = 'none';

// Function to show the view-orders-link
function showViewOrdersLink() {
    viewOrdersLink.style.display = 'block';
}

// Get all "Add to Order" buttons
const addToOrderButtons = document.querySelectorAll('.add-button');

// Attach a click event listener to each "Add to Order" button
addToOrderButtons.forEach(button => {
    button.addEventListener('click', showViewOrdersLink);
});


