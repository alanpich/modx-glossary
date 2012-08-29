console.log('assets/components/glossary/mgr/js/console.js loaded');

var Glossary = function(config) {
    config = config || {};
    Glossary.superclass.constructor.call(this,config);
};
Ext.extend(Glossary,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {}
});
Ext.reg('Glossary',Glossary);
Glossary = new Glossary();
