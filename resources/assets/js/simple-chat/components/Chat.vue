<template>
    <v-ons-page>
        <div style="margin-bottom: 48px;">
            <Talk
                    :timeline="state.timeline"
                    :user-id="state.userId"
            />
            <Message
                    :user-id="state.userId"
                    :input-text="state.inputText"
            />
        </div>
    </v-ons-page>
</template>
<script>
    import Message from "./Message";
    import Talk from "./Talk";
    import store from "../store";

    export default {
        components: {Talk, Message},
        data() {
            return {
                state: store.state
            };
        },
        mounted() {
            this.connectChannel();
        },
        methods: {
            connectChannel() {
                Echo.channel("simple-chat-channel").listen("MessagePostEvent", e => {
                    store.receiveMessage(e.messages);
                });
            }
        }
    };
</script>