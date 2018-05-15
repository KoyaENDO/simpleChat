<template>
    <div class="talk-item">
        <span class="talk-name">{{ name }}:</span>
        <span
                v-for="(message, index) in talk.messages"
                :key="index"
        >
            <span class="talk-text" v-if="message.type === 'text'">
                {{message.body}}
            </span>
        </span>
    </div>
</template>

<script>
    export default {
        props: {
            talk: Object,
            userId: Number
        },
        computed: {
            isMe() {
                return this.userId === this.talk.userId;
            },
            name() {
                if (this.talk.name && this.talk.userId !== this.userId) {
                    return this.talk.name;
                } else {
                    return "You";
                }
            }
        }
    };
</script>
