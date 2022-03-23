<x-modal-confirm
    event-to-open-modal="custom-show-delete-modal"
    event-to-close-modal="ideaWasDeleted"
    modal-title="Delete Algorithm"
    modal-description="Are you sure you want to delete this algorithm? This action cannot be undone."
    modal-confirm-button-text="Delete"
    wire-click="deleteIdea"
/>
