import Ember from 'ember';

export default Ember.Route.extend({
	model() {
       // return Ember.$.getJSON("/comments");
		return this.get('store').findAll('comment');

   	}
});
