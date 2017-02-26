<template>


               <form method="POST" action="/subscriptions">
                 
              
                <input type="hidden" name="stripeToken" v-model="stripeToken">
                <input type="hidden" name ="stripeEmail" v-model="stripeEmail">
                <button type="submit"  @click.prevent="subscribe"> Subscrib</button>

                <select name="plan" v-model="plan">

                    <option v-for="plan in plans":value="plan.id">
                    {{plan.name}} &mdash;  ${{plan.price/100}} 
                    </option>

                </select>

                </form>

</template>

<script>
    export default {

        props:['plans'],

        data(){
                return {
                    stripeEmail: '',
                    stripeToken: '',
                    plan:1
                }
        },

        created(){

            var $this = this;
            this.stripe_checkout = StripeCheckout.configure({
            key: Laravel.stripeKey,
            image:"https://stripe.com/img/documentation/checkout/marketplace.png",
            locale:"auto",
            panelLabel:'Subscribe For',
            token: (token)=>{
        
                console.log(token);
                $this.stripeEmail = token.email;
                $this.stripeToken = token.id;

                $this.$http.post('/subscriptions', $this.$data).then(response=>{
                    alert('Complete, Thanks for your payment !');
                });

            }

        });


        },

        methods: {

            subscribe(){

                   let plan=this.findPlanById(this.plan);

                   this.stripe_checkout.open({

                        amount: plan.price,
                        name: plan.name,
                        description:plan.name

                     });


                },

            findPlanById(id)
                {
                       return this.plans.find(plan=>plan.id==id);

                }

              

        }
    }
</script>