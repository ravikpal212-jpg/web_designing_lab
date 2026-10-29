<!DOCTYPE html>
<html><head><title>Form Validation</title><script src="validation.js"></script></head>
<body>
<h2>Registration</h2>
<form onsubmit="return validateRegistration()">
<input id="name" placeholder="Name"><input id="email" type="email" placeholder="Email">
<input id="password" type="password" placeholder="Password"><button>Register</button>
</form>
<h2>Checkout Validation</h2>
<form onsubmit="return validateCheckout()">
<input id="shipname" placeholder="Name"><input id="pin" placeholder="PIN"><button>Checkout</button>
</form>
</body></html>