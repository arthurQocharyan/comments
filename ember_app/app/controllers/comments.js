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
        addReply(){
            console.log('aaa');
        }

    }
});
