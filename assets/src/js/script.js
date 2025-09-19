// Import necessary libraries
const AOS = window.AOS
const gsap = window.gsap
const ScrollTrigger = window.ScrollTrigger

// Initialize AOS (Animate On Scroll)
document.addEventListener("DOMContentLoaded", () => {
  AOS.init({
    duration: 1000,
    easing: "ease-in-out",
    once: true,
    offset: 100,
  })

  // Initialize GSAP ScrollTrigger
  gsap.registerPlugin(ScrollTrigger)

  // Initialize all functionality
  initNavigation()
  initScrollEffects()
  initAnimations()
  initCalculator()
  initForms()
  initCounters()
})

// Navigation functionality
function initNavigation() {
  const navMenu = document.getElementById("nav-menu")
  const navToggle = document.getElementById("nav-toggle")
  const navClose = document.getElementById("nav-close")
  const navLinks = document.querySelectorAll(".nav__link")
  const header = document.getElementById("header")

  // Show menu
  if (navToggle) {
    navToggle.addEventListener("click", () => {
      navMenu.classList.add("show-menu")
    })
  }

  // Hide menu
  if (navClose) {
    navClose.addEventListener("click", () => {
      navMenu.classList.remove("show-menu")
    })
  }

  // Remove menu mobile when clicking nav links
  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      navMenu.classList.remove("show-menu")
    })
  })

  // Change header background on scroll
  window.addEventListener("scroll", () => {
    if (window.scrollY >= 50) {
      header.classList.add("scrolled")
    } else {
      header.classList.remove("scrolled")
    }
  })

  // Smooth scroll for anchor links
  navLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault()
      const targetId = this.getAttribute("href")
      const targetSection = document.querySelector(targetId)

      if (targetSection) {
        const headerHeight = header.offsetHeight
        const targetPosition = targetSection.offsetTop - headerHeight

        window.scrollTo({
          top: targetPosition,
          behavior: "smooth",
        })
      }
    })
  })
}

// Scroll effects
function initScrollEffects() {
  // Parallax effect for hero decorations
  const decorations = document.querySelectorAll(".decoration")

  window.addEventListener("scroll", () => {
    const scrolled = window.pageYOffset
    const rate = scrolled * -0.5

    decorations.forEach((decoration, index) => {
      const speed = (index + 1) * 0.3
      decoration.style.transform = `translateY(${rate * speed}px)`
    })
  })

  // Floating animation for hero image
  gsap.to(".floating", {
    y: -20,
    duration: 3,
    ease: "power2.inOut",
    yoyo: true,
    repeat: -1,
  })
}

// Advanced animations with GSAP
function initAnimations() {
  // Hero section animations
  const heroTimeline = gsap.timeline()

  heroTimeline
    .from(".hero__title", {
      opacity: 0,
      y: 50,
      duration: 1,
      ease: "power3.out",
    })
    .from(
      ".hero__subtitle",
      {
        opacity: 0,
        y: 30,
        duration: 0.8,
        ease: "power3.out",
      },
      "-=0.5",
    )
    .from(
      ".benefit-item",
      {
        opacity: 0,
        y: 20,
        duration: 0.6,
        stagger: 0.1,
        ease: "power3.out",
      },
      "-=0.3",
    )
    .from(
      ".hero__cta",
      {
        opacity: 0,
        y: 30,
        duration: 0.8,
        ease: "power3.out",
      },
      "-=0.2",
    )

  // Stats animation on scroll
  gsap.utils.toArray(".stat-card, .stat-bubble").forEach((stat) => {
    gsap.from(stat, {
      scale: 0.8,
      opacity: 0,
      duration: 0.8,
      ease: "back.out(1.7)",
      scrollTrigger: {
        trigger: stat,
        start: "top 80%",
        end: "bottom 20%",
        toggleActions: "play none none reverse",
      },
    })
  })

  // Problem cards stagger animation
  gsap.from(".problem__card", {
    y: 50,
    opacity: 0,
    duration: 0.8,
    stagger: 0.2,
    ease: "power3.out",
    scrollTrigger: {
      trigger: ".problem__grid",
      start: "top 80%",
    },
  })

  // Benefits animation
  gsap.from(".benefit", {
    x: -50,
    opacity: 0,
    duration: 0.8,
    stagger: 0.2,
    ease: "power3.out",
    scrollTrigger: {
      trigger: ".solution__benefits",
      start: "top 80%",
    },
  })

  // Process steps animation
  gsap.from(".step", {
    y: 50,
    opacity: 0,
    duration: 0.8,
    stagger: 0.3,
    ease: "power3.out",
    scrollTrigger: {
      trigger: ".process__steps",
      start: "top 80%",
    },
  })

  // Testimonials animation
  gsap.from(".testimonial", {
    scale: 0.9,
    opacity: 0,
    duration: 0.8,
    stagger: 0.2,
    ease: "back.out(1.7)",
    scrollTrigger: {
      trigger: ".testimonials__grid",
      start: "top 80%",
    },
  })

  // Guarantees animation
  gsap.from(".guarantee", {
    y: 50,
    opacity: 0,
    duration: 0.8,
    stagger: 0.15,
    ease: "power3.out",
    scrollTrigger: {
      trigger: ".guarantees__grid",
      start: "top 80%",
    },
  })

  // Button hover animations
  document.querySelectorAll(".btn").forEach((btn) => {
    btn.addEventListener("mouseenter", () => {
      gsap.to(btn, {
        scale: 1.05,
        duration: 0.3,
        ease: "power2.out",
      })
    })

    btn.addEventListener("mouseleave", () => {
      gsap.to(btn, {
        scale: 1,
        duration: 0.3,
        ease: "power2.out",
      })
    })
  })
}

// Calculator functionality
let calculatorData = {
  bill: 0,
  city: "",
  people: "",
}

function initCalculator() {
  // Calculator modal functionality is handled by openCalculator and closeCalculator functions
}

function openCalculator() {
  const modal = document.getElementById("calculator-modal")
  modal.classList.add("show")

  // Reset calculator
  calculatorData = { bill: 0, city: "", people: "" }
  showStep(1)

  // Prevent body scroll
  document.body.style.overflow = "hidden"
}

function closeCalculator() {
  const modal = document.getElementById("calculator-modal")
  modal.classList.remove("show")

  // Restore body scroll
  document.body.style.overflow = "auto"
}

function showStep(stepNumber) {
  // Hide all steps
  document.querySelectorAll(".calculator__step").forEach((step) => {
    step.classList.remove("active")
  })

  // Show current step
  document.getElementById(`step-${stepNumber}`).classList.add("active")
}

function selectBill(amount) {
  calculatorData.bill = amount

  // Update UI
  document.querySelectorAll(".calculator__option").forEach((option) => {
    option.classList.remove("selected")
  })
  event.target.classList.add("selected")

  // Move to next step after delay
  setTimeout(() => {
    showStep(2)
  }, 500)
}

function selectCity(city) {
  calculatorData.city = city

  // Update UI
  document.querySelectorAll("#step-2 .calculator__option").forEach((option) => {
    option.classList.remove("selected")
  })
  event.target.classList.add("selected")

  // Move to next step after delay
  setTimeout(() => {
    showStep(3)
  }, 500)
}

function selectPeople(people) {
  calculatorData.people = people

  // Update UI
  document.querySelectorAll("#step-3 .calculator__option").forEach((option) => {
    option.classList.remove("selected")
  })
  event.target.classList.add("selected")

  // Calculate and show results after delay
  setTimeout(() => {
    calculateSavings()
    showStep("results")
  }, 500)
}

function calculateSavings() {
  const { bill, city, people } = calculatorData

  // Base savings calculation (simplified)
  const savingsPercentage = 0.85 // 85% average savings

  // Adjust based on city (sun hours)
  const cityMultipliers = {
    valencia: 1.0,
    alicante: 1.1,
    castellon: 0.95,
    other: 0.9,
  }

  // Adjust based on household size
  const peopleMultipliers = {
    "1-2": 0.9,
    "3-4": 1.0,
    "5+": 1.1,
  }

  const cityMultiplier = cityMultipliers[city] || 0.9
  const peopleMultiplier = peopleMultipliers[people] || 1.0

  const monthlySavings = Math.round(bill * savingsPercentage * cityMultiplier * peopleMultiplier)
  const yearlySavings = monthlySavings * 12
  const co2Reduction = Math.round(yearlySavings * 0.4) // Approximate CO2 reduction in kg

  // Update results in DOM
  document.getElementById("monthly-savings").textContent = `€${monthlySavings}`
  document.getElementById("yearly-savings").textContent = `€${yearlySavings}`
  document.getElementById("co2-reduction").textContent = `${co2Reduction} kg`

  // Animate the numbers
  animateNumbers()
}

function animateNumbers() {
  const numbers = document.querySelectorAll(".result-number")

  numbers.forEach((number) => {
    const finalValue = number.textContent
    const numericValue = Number.parseInt(finalValue.replace(/[^\d]/g, ""))
    const prefix = finalValue.replace(/[\d\s]/g, "")
    const suffix = finalValue
      .replace(/[^\s\w]/g, "")
      .replace(/\d/g, "")
      .trim()

    gsap.from(
      { value: 0 },
      {
        value: numericValue,
        duration: 2,
        ease: "power2.out",
        onUpdate: function () {
          const currentValue = Math.round(this.targets()[0].value)
          number.textContent = `${prefix}${currentValue.toLocaleString()} ${suffix}`.trim()
        },
      },
    )
  })
}

function showContactForm() {
  closeCalculator()

  // Scroll to contact form
  const contactSection = document.getElementById("contacto")
  const headerHeight = document.getElementById("header").offsetHeight
  const targetPosition = contactSection.offsetTop - headerHeight

  window.scrollTo({
    top: targetPosition,
    behavior: "smooth",
  })

  // Focus on first input after scroll
  setTimeout(() => {
    document.getElementById("name").focus()
  }, 1000)
}

// Form handling
function initForms() {
  const contactForm = document.getElementById("contact-form")

  if (contactForm) {
    contactForm.addEventListener("submit", handleFormSubmit)
  }

  // Form validation
  const inputs = document.querySelectorAll(".form-input")
  inputs.forEach((input) => {
    input.addEventListener("blur", validateInput)
    input.addEventListener("input", clearValidationError)
  })
}

function handleFormSubmit(e) {
  e.preventDefault()

  const formData = new FormData(e.target)
  const data = Object.fromEntries(formData)

  // Basic validation
  if (!validateForm(data)) {
    return
  }

  // Show loading state
  const submitBtn = e.target.querySelector('button[type="submit"]')
  const originalText = submitBtn.innerHTML
  submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...'
  submitBtn.disabled = true

  // Simulate form submission (replace with actual API call)
  setTimeout(() => {
    // Success state
    submitBtn.innerHTML = '<i class="fas fa-check"></i> ¡Enviado!'
    submitBtn.style.backgroundColor = "var(--success-color)"

    // Show success message
    showNotification("¡Gracias! Te contactaremos en menos de 24 horas.", "success")

    // Reset form after delay
    setTimeout(() => {
      e.target.reset()
      submitBtn.innerHTML = originalText
      submitBtn.disabled = false
      submitBtn.style.backgroundColor = ""
    }, 3000)
  }, 2000)
}

function validateForm(data) {
  let isValid = true

  // Required fields
  const requiredFields = ["name", "phone", "email", "city"]

  requiredFields.forEach((field) => {
    if (!data[field] || data[field].trim() === "") {
      showFieldError(field, "Este campo es obligatorio")
      isValid = false
    }
  })

  // Email validation
  if (data.email && !isValidEmail(data.email)) {
    showFieldError("email", "Por favor, introduce un email válido")
    isValid = false
  }

  // Phone validation
  if (data.phone && !isValidPhone(data.phone)) {
    showFieldError("phone", "Por favor, introduce un teléfono válido")
    isValid = false
  }

  // Privacy policy acceptance
  if (!data.privacy) {
    showNotification("Debes aceptar la política de privacidad", "error")
    isValid = false
  }

  return isValid
}

function validateInput(e) {
  const input = e.target
  const value = input.value.trim()

  clearValidationError(input)

  if (input.hasAttribute("required") && !value) {
    showFieldError(input.name, "Este campo es obligatorio")
    return
  }

  if (input.type === "email" && value && !isValidEmail(value)) {
    showFieldError(input.name, "Por favor, introduce un email válido")
    return
  }

  if (input.type === "tel" && value && !isValidPhone(value)) {
    showFieldError(input.name, "Por favor, introduce un teléfono válido")
    return
  }
}

function clearValidationError(input) {
  if (typeof input === "object") {
    input = input.target || input
  }

  const errorElement = input.parentNode.querySelector(".field-error")
  if (errorElement) {
    errorElement.remove()
  }

  input.style.borderColor = ""
}

function showFieldError(fieldName, message) {
  const field = document.querySelector(`[name="${fieldName}"]`)
  if (!field) return

  // Clear existing error
  clearValidationError(field)

  // Add error styling
  field.style.borderColor = "var(--error-color)"

  // Add error message
  const errorElement = document.createElement("div")
  errorElement.className = "field-error"
  errorElement.style.color = "var(--error-color)"
  errorElement.style.fontSize = "var(--font-size-sm)"
  errorElement.style.marginTop = "var(--spacing-1)"
  errorElement.textContent = message

  field.parentNode.appendChild(errorElement)
}

function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  return emailRegex.test(email)
}

function isValidPhone(phone) {
  const phoneRegex = /^[+]?[\d\s\-$$$$]{9,}$/
  return phoneRegex.test(phone)
}

// Notification system
function showNotification(message, type = "info") {
  const notification = document.createElement("div")
  notification.className = `notification notification-${type}`
  notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${type === "success" ? "check-circle" : type === "error" ? "exclamation-circle" : "info-circle"}"></i>
            <span>${message}</span>
        </div>
        <button class="notification-close" onclick="this.parentNode.remove()">
            <i class="fas fa-times"></i>
        </button>
    `

  // Add styles
  notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === "success" ? "var(--success-color)" : type === "error" ? "var(--error-color)" : "var(--primary-color)"};
        color: white;
        padding: var(--spacing-4);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        z-index: var(--z-tooltip);
        display: flex;
        align-items: center;
        gap: var(--spacing-3);
        max-width: 400px;
        animation: slideInRight 0.3s ease-out;
    `

  document.body.appendChild(notification)

  // Auto remove after 5 seconds
  setTimeout(() => {
    if (notification.parentNode) {
      notification.style.animation = "slideOutRight 0.3s ease-in"
      setTimeout(() => notification.remove(), 300)
    }
  }, 5000)
}

// Counter animations
function initCounters() {
  const counters = document.querySelectorAll(".stat__number")

  counters.forEach((counter) => {
    const target = counter.textContent
    const numericValue = Number.parseInt(target.replace(/[^\d]/g, ""))

    if (numericValue) {
      ScrollTrigger.create({
        trigger: counter,
        start: "top 80%",
        onEnter: () => {
          gsap.from(
            { value: 0 },
            {
              value: numericValue,
              duration: 2,
              ease: "power2.out",
              onUpdate: function () {
                const currentValue = Math.round(this.targets()[0].value)
                const formattedValue = target.replace(/\d+/, currentValue.toLocaleString())
                counter.textContent = formattedValue
              },
            },
          )
        },
      })
    }
  })
}

// Utility functions
function debounce(func, wait) {
  let timeout
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout)
      func(...args)
    }
    clearTimeout(timeout)
    timeout = setTimeout(later, wait)
  }
}

function throttle(func, limit) {
  let inThrottle
  return function () {
    const args = arguments
    
    if (!inThrottle) {
      func.apply(this, args)
      inThrottle = true
      setTimeout(() => (inThrottle = false), limit)
    }
  }
}

// Close modal when clicking outside
document.addEventListener("click", (e) => {
  const modal = document.getElementById("calculator-modal")
  if (e.target === modal) {
    closeCalculator()
  }
})

// Close modal with Escape key
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape") {
    closeCalculator()
  }
})

// Add CSS animations for notifications
const style = document.createElement("style")
style.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    
    .notification-content {
        display: flex;
        align-items: center;
        gap: var(--spacing-2);
        flex: 1;
    }
    
    .notification-close {
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        padding: var(--spacing-1);
        border-radius: 50%;
        transition: background-color 0.2s;
    }
    
    .notification-close:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }
`
document.head.appendChild(style)

// Performance optimization: Lazy load images
function initLazyLoading() {
  const images = document.querySelectorAll('img[src*="placeholder.svg"]')

  const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const img = entry.target
        // Here you would replace with actual image URLs
        // For now, we keep the placeholder
        observer.unobserve(img)
      }
    })
  })

  images.forEach((img) => imageObserver.observe(img))
}

// Initialize lazy loading when DOM is ready
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initLazyLoading)
} else {
  initLazyLoading()
}

// Add smooth reveal animation for elements
function addRevealAnimation() {
  const revealElements = document.querySelectorAll(".section")

  const revealObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = "1"
          entry.target.style.transform = "translateY(0)"
        }
      })
    },
    {
      threshold: 0.1,
    },
  )

  revealElements.forEach((element) => {
    element.style.opacity = "0"
    element.style.transform = "translateY(20px)"
    element.style.transition = "opacity 0.6s ease, transform 0.6s ease"
    revealObserver.observe(element)
  })
}

// Initialize reveal animations
document.addEventListener("DOMContentLoaded", addRevealAnimation)