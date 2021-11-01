const error = {
    props: ['error_messages',],
    template: `<transition-group name="show-error">
                    <div class="message" v-for="(message, index) in error_messages"
                     :key="message" :style="errorMargin(index)">
                     <span>{{message}}</span>
                     <span  @click="closeError(index)"><i class="fas fa-times-circle close-btn"></i></span>
                     </div>
                </transition-group>`,
    methods: {
        errorMargin(index){
            return `top: ${index*35 + 5}px;`
         },
         closeError(index){
            
            this.$emit('close-error',index);

         }
    },

}