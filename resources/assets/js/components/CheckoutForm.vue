<template>


               <form method="POST" action="/purchases">
                 
              
                <input type="hidden" name="stripeToken" v-model="stripeToken">
                <input type="hidden" name ="stripeEmail" v-model="stripeEmail">
                <button type="submit"  @click.prevent="buy"> Back this project </button>

                </form>

</template>

<script>
    export default {

        data(){
                return {
                    stripeEmail: '',
                    stripeToken: ''
                }
        },

        created(){

             var $this = this;
            this.stripe_checkout = StripeCheckout.configure({
            key: Laravel.stripeKey,
            image:"https://stripe.com/img/documentation/checkout/marketplace.png",
            locale:"auto",
            token: (token)=>{
        
                console.log(token);
                $this.stripeEmail = token.email;
                $this.stripeToken = token.id;

                $this.$http.post('/purchases', $this.$data).then(response=>{
                    alert('Complete, Thanks for your payment !');
                });

            }

        });


        },

        methods: {
            buy(){

                   this.stripe_checkout.open({

                        amount: 2500,
                        name:"My Product Name",
                        description:"A simple test product.",

                     });




                }

        }
    }
</script>