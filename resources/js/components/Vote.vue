<template>
    <div class="f-flex flex-column vote-controls">
        <a @click.prevent="voteUp"
        :title="title('up')" 
        class="vote-up" :class="classes">
            <span>&#128077</span>                      
        </a>

        <span class="votes-count">{{ count }}</span>
        <a 
            :title="title('down')" 
            class="vote-down off" :class="classes">
            <span>&#128078</span>
        </a>
        

        <favorite v-if="name === 'question'" :question="model"></favorite>

        <accept v-else :answer=model></accept>
    </div> 
</template>

<script>
import Favourite from "./Favourite.vue"
import Accept from "./Accept.vue"

export default {
    props: ['name', 'model'],

    data(){
        return {
            count: this.model.votes_count,
            id: this.model.id
        }
    },
    components: {
        Favourite,
        Accept
    },

    computed: {
        classes(){
            return this.signedIn ? '' : 'off'
        },
        endpoint(){
            return `/${this.name}s/${this.id}/vote`
        }
    },


    methods: {
        title(voteType){
            let titles = {
                up: `This ${this.name} is useful`,
                down: `This ${this.name} is useful`
            };

            return titles[voteType];
        },

        voteUp(){
            this._vote(1);
        },
        voteDown(){
            this._vote(-1);
        },

        _vote(){
            if (!this.signedIn){
                this.$toast.warning(`Please login to vote the ${this.name}`, "Warning", {
                     timeout: 3000,
                     position: "bottomLeft"
                })

                return;
            }
                axios.post(this.endpoint, { vote })
                .then(res => {
                    this.$toast.success(res.data.message, "success", {
                        timeout: 3000,
                        position: 'bottomLeft'
                    });

                    this.count = res.data.voteCount;
                })
        }
    }


}
</script>