import DS from 'ember-data';

export default DS.RESTSerializer.extend(
    DS.EmbeddedRecordsMixin, { attrs:
        {
            comm_reply: { embedded: 'always' }
        }
    }

);
