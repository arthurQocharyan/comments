import Ember from 'ember';

export default Ember.Controller.extend({
    actions : {
        addComment(commentText){
            let comment = this.store.createRecord('comment', {
                text : commentText,
            });
            comment.save().then(function(value){


            });
        },
        addReply(model,reply){
            let comment = this.get('store').createRecord('comment', {
                text: reply,

            });
            model.get('comm_reply').then(function(child){
                child.pushObject(comment);
            });
            comment.save();
        }

    }
});
