import DS from 'ember-data';

export default DS.Model.extend({
	text : DS.attr('string'),
	parent_id : DS.attr('number'),
	comm_reply : DS.hasMany('comment', {inverse: 'child'}),
	child     : DS.belongsTo('comment',{ inverse: null }),


});
