function payWithPaystack() {
    let handler = PaystackPop.setup({
      key: 'pk_live_bd5356607a881f3a0d6843b75d3172b74b9675cd', // Replace with your public key
      email: 'admin@gmail.com',
      currency: "GHS",
      amount: $('#amt').html() * 100,
      // label: "Optional string that replaces customer email"
      onClose: function(){
        alert('Window closed.');
      },
      callback: function(response){
        let message = 'Payment complete! Reference: ' + response.reference;
        window.location.href = "../functions/process_payment.php?status=completed";
        console.log(response.reference);
        alert(message);
      }
    });
    handler.openIframe();
}