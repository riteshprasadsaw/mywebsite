<template>


               <form method="POST" action="/purchases">
                 
              
                <input type="hidden" name="stripeToken" v-model="stripeToken">
                <input type="hidden" name ="stripeEmail" v-model="stripeEmail">
                <button type="submit"  @click.prevent="buy"> Back this project </button>

                <select name="product" v-model="product">

                    <option v-for="product in products":value="product.id">
                    {{product.name}} &mdash;  ${{product.price/100}} 
                    </option>

                </select>

                </form>

</template>

<script>
    export default {

        props:['products'],

        data(){
                return {
                    stripeEmail: '',
                    stripeToken: '',
                    product:1
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

                   let product=this.findProductById(this.product);

                   this.stripe_checkout.open({

                        amount: product.price,
                        name: product.name,
                        description:product.description

                     });


                },

            findProductById(id)
                {
                       return this.products.find(product=>product.id==id);

                }

              

        }
    }
</script>