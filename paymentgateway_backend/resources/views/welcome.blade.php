<div class="container fluid">
  <h1 align="center">Cashfree PG Test Form</h1>
  
    @csrf
    {{-- <div class="form-group">
      <label>App ID:</label><br>
      <input class="form-control" name="appId" placeholder="Enter App ID here (Ex. 123456a7890bc123defg4567)"/>
    </div> --}}
    <form id="redirectForm" method="post" action="wel">
    <div class="form-group">
      <label>Order ID:</label><br>
      <input class="form-control" name="orderId" placeholder="Enter Order ID here (Ex. order00001)"/>
    </div>
    <div class="form-group">
      <label>Order Amount:</label><br>
      <input class="form-control" name="orderAmount" placeholder="Enter Order Amount here (Ex. 100)"/>
    </div>
    <div class="form-group">
      <label>Order Currency:</label><br>
      <input class="form-control" name="orderCurrency" value="INR" placeholder="Enter Currency here (Ex. INR)"/>
    </div>
    <div class="form-group">
      <label>Order Note:</label><br>
      <input class="form-control" name="orderNote" placeholder="Enter Order Note here (Ex. Test order)"/>
    </div>    
    <div class="form-group">
      <label>Name:</label><br>
      <input class="form-control" name="customerName" placeholder="Enter your name here (Ex. John Doe)"/>
    </div>
    <div class="form-group">
      <label>Email:</label><br>
      <input class="form-control" name="customerEmail" placeholder="Enter your email address here (Ex. Johndoe@test.com)"/>
    </div>
    <div class="form-group">
      <label>Phone:</label><br>
      <input class="form-control" name="customerPhone" placeholder="Enter your phone number here (Ex. 9999999999)"/>
    </div>
    <div class="form-group">
      <label>Return URL:</label><br>
      <input class="form-control" name="returnUrl" placeholder="Enter the URL to which customer will be redirected (Ex. www.example.com)"/>
    </div>        
    <div class="form-group">
      <label>Notify URL:</label><br>
      <input class="form-control" name="notifyUrl" placeholder="Enter the URL to get server notificaitons (Ex. www.example.com)"/>
    </div>
    <button type="submit" class="btn btn-primary btn-block" value="Pay">Submit</button>
    <br> 
    <br>
  </form><br> 
  <br><br> 
  <br>
</div>