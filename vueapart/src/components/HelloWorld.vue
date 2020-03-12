<template>
  <div id="app">
    <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3" id="formtag"  method="post" >
        <h1>Http</h1>
       <!-- <p> {{response.data.signature}}</p> -->
       <!-- <div >signature: {{signature}} </div>
         <div >appId: {{appId}} </div>
         <div >secretkey: {{secretKey }} </div>
         <div >paymentOption: {{paymentOption}} </div>
         <div >paymentCode: {{paymentCode}} </div>
         <div >user.orderId: {{orderId}} </div>
         <div >returnUrl: {{returnUrl}} </div>
         <div >notifyUrl: {{notifyUrl}} </div>
         <div >user.customerName: {{customerName}} </div>
         <div >user.customerEmail: {{customerEmail}} </div>
         <div >user.customerPhone: {{customerPhone}} </div> -->

          <div class="form-group">
          <label>orderId</label>
          <input class="form-control" type="text" v-model= "user.orderId">
          </div>
          <div class="form-group">
          <label>customerName</label>
          <input class="form-control" type="text" v-model= "user.customerName">
          </div>
          <div class="form-group">
          <label>customerEmail</label>
          <input class="form-control" type="text" v-model= "user.customerEmail">
          </div>
          <div class="form-group">
          <label>customerPhone</label>
          <input class="form-control" type="text" v-model= "user.customerPhone">
          </div>
          <div class="form-group">
          <label>Amount</label>
          <input class="form-control" type="text" v-model= "user.orderAmount">
          </div>
           
             <!-- Bank Details -->
        <h1>Payment Form</h1>
    <table border = "3" cellpadding = "5" cellspacing = "5">
      <tr>
        <th>Type</th>
        <th>Details</th>
        <th>Submit</th>
      </tr>
      <!-- <tr>
        <td>Cards</td>
        <td>
          <form>
            <p>Card Number: <input type="text" id="card-num" value ="4111111111111111"/>
            CVV:<input type="text" id="card-cvv" value="123"/></p>
            <p>MM:<input type="text" id="card-mm" value="09"/>
            YYYY:<input type="text" id="card-yyyy" value="2018"/></p>
            Name:<input type="text" id="card-name" value="test"/>
          </form>
        </td>
        <td>
          <button onclick="payCard()">Pay with Card</button>      
        </td>
      </tr> -->
      <tr>
        <td>Net Banking</td>
        <td>
          Select Bank: 
          <select id="bank-code" v-model= "payment.nb" value="nb">
            <option value="3333" >TEST Bank</option>
            <option value="3003">Axis Bank</option>
            <option value="3028">IndusInd Bank</option>
            <option value="3057">Vijaya Bank</option>
          </select>
        </td>
        <td>
          <!-- <button onclick="payBank()">Pay with Net Banking</button>    -->
          <!-- <input type="radio" onclick="payBank()" id="netBanking" value="nb" v-model="picked">    -->
        </td>
      </tr>
      <!-- <tr>
        <td>Wallet</td>
        <td>
          Select Wallet: 
          <select id="wallet-code" v-model="payment.paymentOption ">
            <option value="4001">FreeCharge</option>
            <option value="4002">MobiKwik</option>
            <option value="4003">Ola Money</option>
          </select>
        </td>
        <td>
           <button onclick="payWallet()">Pay with Wallet</button>  -->
          <!-- <input type="radio" onclick="payWallet()" id="wallet" value="wallet" v-model="picked"> 
        </td>
      </tr> --> 
      <tr>
        <td>UPI</td>
        <td>
          Your UPI VPA: 
          <input type="text" id="upi-vpa" v-model= "payment.upi" value="upi"/>
        </td>
        <td>
          <!-- <button onclick="payUpi()">Pay with UPI</button>      -->
           <!-- <input type="radio" onclick="payUpi()" id="upi" value="upi" v-model="picked">  -->
        </td>
      </tr>
    </table>
      <br>
      <span>Picked: {{ picked }}</span>
      <br>
          <button class="btn btn-primary" value="pay"  @click= "submit" >Submit</button>
          <hr>
           <!-- <paymentform @click="submit"/> -->
          <!-- <button class="btn btn-primary" @click="fetchData">Get Data</button> -->
          <!-- <ul class="list-group">
            <li class="list-group-item" v-for="u in users">{{u.username}} -{{u.email}}</li>
          </ul> -->      
</div>
        <div v-if= "htmlData !== '' " v-html= "htmlData" >
          {{htmlData}}
        </div>

        <form id="redirectForm4" method="post" action="https://test.cashfree.com/billpay/checkout/post/submit">
          <input type="hidden" name="appId" id="appId" />
          <input type="hidden" name="orderId" id="orderId"  />
          <input type="hidden" name="orderAmount"  id="orderAmount"  />
          <input type="hidden" name="orderCurrency" id="orderCurrency" />
          <input type="hidden" name="orderNote"  id="orderNote" />
          <input type="hidden" name="customerName" id="customerName" />
          <input type="hidden" name="customerEmail"  id="customerEmail"  />
          <input type="hidden" name="customerPhone"  id="customerPhone" />
          <input type="hidden" name="paymentCode"  id="paymentCode" />
          <input type="hidden" name="paymentOption"  id="paymentOption" />
          <input type="hidden" name="returnUrl"  id="returnUrl" />
          <input type="hidden" name="notifyUrl"  id="notifyUrl" />
          <input type="hidden" name="signature"  id="signature" />
        </form>
    </div>
  </div>
  
  </div>
</template>

<script>

// import paymentform from './components/paymentform.vue';
import axios from "axios";

// import qs from 'qs';
export default {
  name: 'HelloWorld',
  // props: {
  //   msg: String
  // },
  props:['htmlData'],
  components:{
    //  paymentform
  },
  data(){
    return{
      check:{},
      signature: '',
      appId: '',
      returnUrl: '',
      notifyUrl: '',
      paymentOption: '',
      paymentCode: '',
      orderId:'',
      orderAmount:'',
      customerName:'',
      customerEmail:'',
      customerPhone:'',
      orderNote: '',
      orderCurrency:'',
      responseLoaded: false,
      picked:"payBank",
      user: {
        orderId:'',
        customerName: '',
        customerEmail: '',
        customerPhone: '',
        orderAmount: '',
      },
      payment:{
        paymentOption:'',
      },
      users: [] 
    };
  },
  // computed: {
  // computedContent: function () {
  //   return this.htmlData
  // }
// },
  methods:{

      //  payCard() {
      //     data.paymentOption = "card";
      //     data.card = {};
      //     data.card.number = document.getElementById("card-num").value; 
      //     data.card.expiryMonth = document.getElementById("card-mm").value;
      //     data.card.expiryYear = document.getElementById("card-yyyy").value;
      //     data.card.holder = document.getElementById("card-name").value;
      //     data.card.cvv = document.getElementById("card-cvv").value;
      //     CashFree.paySeamless(data);
      //     return false;
      //   },

        //   payBank() {
        //   // eslint-disable-next-line no-undef
        //   payment.paymentOption = "nb";
        //   // eslint-disable-next-line no-undef
        //   payment.nb = {};
        //   // eslint-disable-next-line no-undef
        //   payment.nb.code = document.getElementById("bank-code").value;

        //   // CashFree.paySeamless(data);
        //   return false;
        // },

        //  payWallet() {
        //   // eslint-disable-next-line no-undef
        //   payment.paymentOption = "wallet";
        //   // eslint-disable-next-line no-undef
        //   wallet = {};
        //   // eslint-disable-next-line no-undef
        //   wallet.code = document.getElementById("wallet-code").value;

        //   // CashFree.paySeamless(data);
        //   return false;
        // },

        //  payUpi() {
        //   // eslint-disable-next-line no-undef
        //   payment.paymentOption = "upi";
        //   // eslint-disable-next-line no-undef
        //   upi = {};
        //   // eslint-disable-next-line no-undef
        //   upi.vpa = document.getElementById("upi-vpa").value;

        //   // CashFree.paySeamless(data);
        //   return false;
        // },


   async submit(e){
      e.preventDefault();
     
       const info = {
        user: this.user, 
        payment: this.payment,
      };
      //  let form = new FormData();
      //   form.append('user',this.user)
      //   form.append('payment',this.payment);
      // const formData = new FormData();
    let response =await axios.post("http://localhost:8000/ab",info)
        console.log(response);
          // eslint-disable-next-line no-console
          // console.log (response.data.signature);
          // document.getElementsById("signature").value = response.data.signature;
          // console.log(response.data);
          // const data =response.data;
          // const details = [];
          // for(let key in data){
          //   const detail =data[key]
          //   detail.appId =key
          //   details.push(detail)
          // }
          // console.log(details);
          // let formData = new FormData();
          // formData.append('appId',response.data['appId']);
          // console.log(formData);
          // this.signature = response.data.signature;
          // this.appId =response.data.appId;
          // this.secretKey =response.data.secretKey;
          // this.returnUrl =response.data.returnUrl;
          // this.notifyUrl = response.data.notifyUrl;
          // this.paymentOption =response.data.paymentOption;
          // this.paymentCode = response.data.paymentCode;
          // this.orderId = response.data.orderId;
          // this.orderAmount = response.data.orderAmount;
          // this.customerName = response.data.customerName;
          // this.customerEmail =response.data.customerEmail,
          // this.customerPhone = response.data.customerPhone,
          // this.orderNote = response.data.orderNote;
          // this.orderCurrency = null;

         
          // document.getElementById("signature").value = response.data;
          // document.getElementsById("signature").value = response.data.signature;
          // document.getElementsById("signature").value = response.data.signature;
          // document.getElementsById("signature").value = response.data.signature;
          // document.getElementsById("signature").value = response.data.signature;
          // document.getElementsById("redirectForm").submit();
          // console.log(response['signature']);
          //  console.log(response.data.signature);
          for(let key in response.data){
            console.log(key)
            document.getElementById(key.toString()).value = response.data[key];
            // console.log(key);
          }
          //document.write(document.getElementById("appId").value)
          this.check={...response.data}
        
        
        console.log(this.check);
      //   let val={
      //     data:this.check
      //   }
      //  let rr=await axios.post('https://test.cashfree.com/billpay/checkout/post/submit',val);
      var form_data = new FormData();
      for(let key in this.check){
        form_data.append(key, this.check[key]);
      }
      let rr= await axios({
         method:'post',
         url:'https://test.cashfree.com/billpay/checkout/post/submit',
         data:form_data
       })
       // eslint-disable-next-line no-unused-vars
        
        this.htmlData = rr.data;
       extract($_POST);
        //  window.location.replace("http://localhost:8080/abc");
      //  this.responseLoaded = true;
      //  this.$emit('data',this.htmlData);
      //  window.location.href = 'https://test.cashfree.com/billpay/checkout/submit';
       //console.log(rr)
      //  let rf=await axios.post('https://test.cashfree.com/billpay/checkout/post/submit',{
      //    ...rr.config.data
      //  });
          // for(let key in this.check){
          //   console.log(key)
          //   document.getElementById(key.toString()).value = this.check[key];
          //   // console.log(key);
          // }
        //   document.getElementById("appId").value = this.check['appId']
        //   console.log(document.getElementById("appId").value)
        //  document.getElementById('redirectForm').submit();
    },
     
    },
    // fetchData() {
    //   this.$http.get('')
    //   .then(response => {
    //    return response.json();
    //   })
    //   .then(data => {
    //       const resultArray =[];
    //       for (let key in data) {
    //         resultArray.push(data[key]);
    //       }
    //       this.users =resultArray;
    //   });
    // },
  }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
