import _ from "lodash";

const store = {
    state: {
        userId: Math.floor( Math.random() * 10000),
        timeline: [],
        inputText: ""
    },
    setInputText(text) {
        this.state.inputText = text;
    },
    clearInputText() {
        this.state.inputText = "";
    },
    postMessage(text) {
        axios.post("/api/message", {
            userId: this.state.userId,
            message: text
        });
    },
    appendMessage(message) {
        this.state.timeline = [...this.state.timeline, message];
    },
    receiveMessage(message) {
        if (message.name !== 'ゲスト'+this.state.userId){
            this.state.timeline = [
                ...this.state.timeline,
                message
            ];
        }
    }
};

export default store;
