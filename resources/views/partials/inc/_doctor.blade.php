@if (auth()->user()->doctor->type_agent_id == 1)
    @include('partials.inc.agent._doctor')

@elseif (auth()->user()->doctor->type_agent_id == 2)
    @include('partials.inc.agent._sage')

@elseif (auth()->user()->doctor->type_agent_id == 3)
    @include('partials.inc.agent._doctor')
@endif



