	<ul class="sidebar-panel nav">
        {if $smarty.session.adminid eq '1'}
            {section name="menulist" loop=$mainModulesList}
                {if $mainModulesList[menulist].id neq '13'}
                {if $mainModulesList[menulist].menucount gt 0}
                    {assign var = modulesList value = $objAdmin->selectSubMenu($mainModulesList[menulist].id)}
                {/if}
                <li>
                    <a href="{if $mainModulesList[menulist].page_url neq ''}{$mainModulesList[menulist].page_url}{else}javascript:void(0){/if}">
                        <span class="icon color8">
                            <i class="fa fa-th-large"></i>
                        </span>
                        {$mainModulesList[menulist].modulesname|ucfirst|stripslashes} 
                        {if $mainModulesList[menulist].menucount gt 0}<i class="caret"></i>{/if}
                    </a>
                    {if $mainModulesList[menulist].menucount gt 0}
                        <ul>
                            {section name="sub" loop=$modulesList}
                                 <li><a href="{if $modulesList[sub].page_url neq ''}{$modulesList[sub].page_url}{else}javascript:void(0);{/if}">{$modulesList[sub].modulesname|ucfirst|stripslashes}</a></li>
                            {/section}
                        </ul>
                    {/if}
                </li>
                {/if}
            {/section}
        {else}
            {section name="menulist" loop=$mainModulesList}
                {section name="userlist" loop=$userModulesList}
                    {if $userModulesList[userlist].modules eq $mainModulesList[menulist].id}
                        {if $mainModulesList[menulist].id neq '13'}
                        <li><a href="{if $mainModulesList[menulist].page_url neq ''}{$mainModulesList[menulist].page_url}{else}javascript:void(0){/if}">{$mainModulesList[menulist].modulesname|ucfirst|stripslashes}
                         <span class="icon color8">
                            <i class="fa fa-th-large"></i>
                        </span>
                        {if $mainModulesList[menulist].menucount gt 0}<i class="caret"></i>{/if}</a>                        
                            {if $mainModulesList[menulist].menucount gt 0}
                                {*$objAdmin->selectSubMenu($mainModulesList[menulist].id)*}
                                {assign var=subModulesList value=$objAdmin->selectSubMenu($mainModulesList[menulist].id)}
                                
                                <ul>
                                    {section name="sub" loop=$subModulesList}
                                        {section name="usedlist" loop=$userUsedModulesList}
                                            {if $userUsedModulesList[usedlist].modules eq $subModulesList[sub].id}
                                                <li><a href="{if $subModulesList[sub].page_url neq ''}{$subModulesList[sub].page_url}{else}javascript:void(0);{/if}">{$subModulesList[sub].modulesname|ucfirst|stripslashes}</a></li>
                                            {/if}
                                        {/section}
                                    {/section}
                                </ul>
                            {/if}
                        </li>
                        {/if}
                    {/if}
                {/section}
            {/section}
        {/if}
    </ul>  

