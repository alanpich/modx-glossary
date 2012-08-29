Glossary.window.CreateTerm = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: _('glossary.term_create_long')
        ,url: Glossary.config.connectorUrl
        ,config: {
        	saveBtnText: _('glossary.create')
        }
        ,baseParams: {
            action: 'mgr/term/create'
        }
        ,fields: [{
            xtype: 'textfield'
            ,fieldLabel: _('glossary.term')
            ,name: 'term'
            ,anchor: '100%'
        },{
            xtype: 'textarea'
            ,fieldLabel: _('glossary.explanation')
            ,name: 'explanation'
            ,anchor: '100%'
        }]
        
    });
    Glossary.window.CreateTerm.superclass.constructor.call(this,config);
};
Ext.extend(Glossary.window.CreateTerm,MODx.Window);
Ext.reg('glossary-window-term-create',Glossary.window.CreateTerm);
