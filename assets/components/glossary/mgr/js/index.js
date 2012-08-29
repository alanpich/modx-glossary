Ext.onReady(function() {
    MODx.load({ xtype: 'glossary-page-home'});
});
 
Glossary.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'glossary-panel-main'
            ,renderTo: 'glossary-panel-main'
        }]
    });
    Glossary.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(Glossary.page.Home,MODx.Component);
Ext.reg('glossary-page-home',Glossary.page.Home);
