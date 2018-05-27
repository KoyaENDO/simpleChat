<template>
    <div>
        <div :class="['chat-talk', isMe? 'chat-right': 'chat-left']">
            <span class="talk-name">{{ name }}</span>
            <div class="chat-position-clear"></div>
            <div class="message-box">
                <div
                        v-for="(message, index) in talk.messages"
                        :key="index"
                >
                    <span class="message-text" v-if="message.type === 'text'">
                        {{message.body}}
                    </span>
                </div>
            </div>
        </div>
        <div class="chat-position-clear"></div>
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
