Glossary.panel.Main = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,cls: 'container'
        ,items: [{
            html: '<h2>'+_('glossary.management')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
          ,items: [{
                title: _('glossary.terms')
                ,defaults: { autoHeight: true }
                ,items: [{
                    xtype: 'glossary-grid-terms'
                    ,cls: 'main-wrapper'
                    ,preventRender: true
                }]
            }]
        }]
    });
    Glossary.panel.Main.superclass.constructor.call(this,config);
};
Ext.extend(Glossary.panel.Main,MODx.Panel);
Ext.reg('glossary-panel-main',Glossary.panel.Main);

