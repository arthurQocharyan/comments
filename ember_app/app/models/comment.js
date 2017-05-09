import DS from 'ember-data';

export default DS.Model.extend({
	text : DS.attr('string'),
	parent_id : DS.attr('number'),
    created_at: DS.attr('date'),
    comm_reply: DS.hasMany('comment', { inverse: 'parent'}),
    parent: DS.belongsTo('comment', { inverse: 'comm_reply' })


});
