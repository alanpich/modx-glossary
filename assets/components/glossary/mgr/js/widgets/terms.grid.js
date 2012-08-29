Glossary.grid.Terms = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'glossary-grid-terms'
        ,url: Glossary.config.connectorUrl
        ,baseParams: { action: 'mgr/term/getList' }
        ,fields: ['id','term','explanation']
        ,paging: true
        ,remoteSort: true
        ,anchor: '97%'
        ,autoExpandColumn: 'explanation'
        ,save_action: 'mgr/term/updateFromGrid'
		,autosave: true
        ,columns: [{
            header: _('glossary.term')
            ,dataIndex: 'term'
            ,sortable: true
            ,width: 30
            ,editor: { xtype: 'textfield' }
            ,renderer: function(term){
            		return '<h3 style="padding:0;margin:0;">'+term+'</h3>';
            	}
        },{
            header: _('glossary.explanation')
            ,dataIndex: 'explanation'
            ,sortable: true
            ,width: 100
            ,editor: { xtype: 'textarea' }
        }]
        ,tbar:[{
			xtype: 'textfield'
			,id: 'glossary-search-filter'
			,emptyText: _('glossary.search...')
			,listeners: {
				'change': {fn:this.search,scope:this}
				,'render': {fn: function(cmp) {
				    new Ext.KeyMap(cmp.getEl(), {
				        key: Ext.EventObject.ENTER
				        ,fn: function() {
				            this.fireEvent('change',this);
				            this.blur();
				            return true;
				        }
				        ,scope: cmp
				    });
				},scope:this}
			}
		},'->',{
		   text: _('glossary.term_create')
		   ,handler: { 
		   		 xtype: 'glossary-window-term-create' 
		   		,blankValues: true
		   		,saveBtnText: _('glossary.term_create')
		   		,cancelBtnText: _('glossary.cancel')
		   	 }
		}]
    });
    Glossary.grid.Terms.superclass.constructor.call(this,config)
};
Ext.extend(Glossary.grid.Terms,MODx.grid.Grid,{
    search: function(tf,nv,ov) {
        var s = this.getStore();
        s.baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
    ,removeDoodle: function() {
		MODx.msg.confirm({
		    title: _('glossary.term_remove')
		    ,text: _('glossary.term_remove_confirm')
		    ,url: this.config.url
		    ,params: {
		        action: 'mgr/term/remove'
		        ,id: this.menu.record.id
		    }
		    ,listeners: {
		        'success': {fn:this.refresh,scope:this}
		    }
		});
	}
	,getMenu: function() {
		return [{
		    text: _('glossary.term_remove')
		    ,handler: this.removeDoodle
		}];
	}

    
    
    
});
Ext.reg('glossary-grid-terms',Glossary.grid.Terms);
