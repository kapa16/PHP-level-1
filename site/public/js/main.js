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
  });

  //--------------order control-------------
  $('.order__status_change').on('click', (evt) => {
    evt.preventDefault();
    const orderId = $(evt.target).data('id');
    let orderStatusFull = $(evt.target).parent().find('option:selected').val();
    const orderStatus = parseInt($(evt.target).parent().find('option:selected').val());
    orderStatusFull = orderStatusFull.replace( /\d+\.\s/g, "" ).toLowerCase();
    $.post({
      url: '/api/order.php',
      data: {
        apiMethod: 'changeOrderStatus',
        postData: {
          id: orderId,
          status: orderStatus
        }
      },
      success: () => {
        $(evt.target).closest('.order_wrapper').find('.order_status').text(orderStatusFull);
      }
    })
  });

  $('.order__product_remove').on('click', (evt) => {
    const $target = $(evt.target);
    const orderProductId = $target.data('id');
    $.post({
      url: '/api/order.php',
      data: {
        apiMethod: 'deleteProductFromOrder',
        postData: {
          id: orderProductId
        }
      },
      success: () => {
        $target.closest('.table_row').addClass('table_row_deleted');
        $target.text('Вернуть');
      }
    })
  });

  $('.order__product_retrieve').on('click', (evt) => {
    const $target = $(evt.target);
    const orderProductId = $target.data('id');
    $.post({
      url: '/api/order.php',
      data: {
        apiMethod: 'retrieveProductFromOrder',
        postData: {
          id: orderProductId
        }
      },
      success: () => {
        $target.closest('.table_row').removeClass('table_row_deleted');
        $target.text('Удалить');
      }
    })
  });};
