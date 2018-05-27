<template>
    <div id="chat-input">
        <input id="chat-input-message"
                     type="text"
                     :value="inputText"
                     @input="e => handleInput(e)"
                     @keyup.enter="send"
                     placeholder="メッセージを入力"
        >
        <v-ons-button id="chat-input-btn" type="button" @click="send">
            送信
        </v-ons-button>
    </div>
</template>
<script>
    import store from "../store";

    export default {
        props: {
            userId: Number,
            inputText: String
        },
        methods: {
            handleInput(e) {
                store.setInputText(e.target.value);
            },
            send() {
                const text = this.inputText.trim().replace(/\n$/, "");
                if (text) {
                    store.clearInputText();
                    store.appendMessage({
                        userId: this.userId,
                        messages: [
                            {
                                type: "text",
                                body: text
                            }
                        ]
                    });
                    store.postMessage(text);
                }
            }
        }
    };
</script>
