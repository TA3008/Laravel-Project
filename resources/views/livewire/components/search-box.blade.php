<div class="d-flex align-items-center w-100" style="max-width: 300px;">
    <input 
        type="text" 
        name="keyword"
        wire:model.defer="keyword"
        class="form-control"
        placeholder="Tìm tiêu đề..."
        style="flex:1;"
    >
    <button 
        type="button"
        wire:click="search"
        class="btn btn-secondary"
    >
        <i class="fas fa-search"></i>
    </button>
</div>