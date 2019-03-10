"use strict";

// const block = document.querySelector('#gallery');
//
// const gallery = new Gallery(block);

window.onload = () => {
  $('#valid').on('submit', e => {
    let valid = new Validator('valid');
    if (!valid.valid){
      e.preventDefault();
    }
  });

  const cart = new Cart('/api/cart.php');

  $('.products__catalog').on('click', (evt) => {
    if (!evt.target.classList.contains('btn-buy')) {
      return;
    }
    evt.preventDefault();
    cart.addProduct(evt.target);
  })

  //--------------order control-------------
  $('.order__status_change').on('click', (evt) => {
    // evt.preventDefault();
    const orderId = $(evt.target).data('id');
    const orderStatus = parseInt($(evt.target).parent().find('option:selected').val());
    $.post({
      url: '/api/order.php',
      data: {
        apiMethod: 'changeOrderStatus',
        postData: {
          id: orderId,
          status: orderStatus
        }
      }
    })
  })
};
