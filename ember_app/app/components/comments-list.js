import Ember from 'ember';

export default Ember.Component.extend({
    addReply: "addReply",
    actions: {
        addReply: function(model, reply){
            this.sendAction("addReply", model, reply);
        }
    }
});
