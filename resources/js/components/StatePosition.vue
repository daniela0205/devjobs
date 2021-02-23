<template>
       <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
        :class="claseStatePosition()"
        @click="changeState"
        :key="statePositionData"
        >
        {{statuPosition}}
        </span>
</template>

<script>
export default {
    props:['state','positionId'],
    mounted(){
        this.statePositionData = Number(this.state);
    },
    data: function(){
        return{
            statePositionData: null
        }
    },
    methods:{
        claseStatePosition(){
            return this.statePositionData === 1 ? "bg-green-100 text-green-800" : "bg-red-100 text-red-800"
        },
        changeState(){
            if(this.statePositionData === 1){
                this.statePositionData=0;
            }else{
                this.statePositionData=1;
            }
           console.log(this.statePositionData);

            //Send axios
            const params = {
                state: this.statePositionData
            }
            axios
                .post('./positions/'+this.positionId, params)
                .then(response => console.log(response))
                .catch(error => console.log(error))
        }
    },
    computed: {
        statuPosition() {
            return this.statePositionData === 1 ? 'Active' : 'Inactive'
        }
    }
}
</script>
