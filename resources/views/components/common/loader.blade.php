<div class="st_model_12_overlay" style="display: none;">
    <div class="st_model_12_container">
        <h2 class="st_model_12_title">Uploading</h2>
        <div class="st_model_12_progress_container">
            <div class="st_model_12_progress_bar"></div>
        </div>
        <p class="st_model_12_status">Progress: <span class="st_model_12_percentage">0%</span></p>
    </div>
</div>

<div class="st_model_13_overlay" id="st_model_13_overlay">
    <div class="st_model_13_container">
        <div class="st_model_13_header">
            <h2 class="st_model_13_title" id="st_model_13_title">Modal Title</h2>
            <button class="st_model_13_close">&times;</button>
        </div>
        <div class="st_model_13_content" id="st_model_13_content">
            <p>Modal content goes here.</p>
        </div>
        <div class="st_model_13_footer" id="st_model_13_footer">
            <button class="st_model_13_button" id="st_model_13_primary_button">Primary Action</button>
            <button class="st_model_13_button st_model_13_secondary" id="st_model_13_secondary_button">Secondary Action</button>
        </div>
    </div>
</div>
@push('scripts')
<script>
    const st_model_13 = {
        overlay: document.getElementById('st_model_13_overlay'),
        title: document.getElementById('st_model_13_title'),
        content: document.getElementById('st_model_13_content'),
        primaryButton: document.getElementById('st_model_13_primary_button'),
        secondaryButton: document.getElementById('st_model_13_secondary_button'),

        open: function() {
            this.overlay.style.display = 'flex';
        },

        close: function() {
            this.overlay.style.display = 'none';
        },

        setTitle: function(title) {
            this.title.textContent = title;
        },

        setContent: function(content) {
            this.content.innerHTML = content;
        },

        setPrimaryButton: function(text, callback) {
            this.primaryButton.textContent = text;
            this.primaryButton.onclick = callback;
        },

        setSecondaryButton: function(text, callback) {
            this.secondaryButton.textContent = text;
            this.secondaryButton.onclick = callback;
        },

        init: function() {
            // Close modal when clicking on the overlay
            this.overlay.addEventListener('click', (e) => {
                if (e.target === this.overlay) {
                    this.close();
                }
            });

            // Close modal when clicking on the close button
            const closeButton = this.overlay.querySelector('.st_model_13_close');
            closeButton.addEventListener('click', () => this.close());
        }
    };

    // Initialize the modal
    st_model_13.init();
</script>
@endpush
