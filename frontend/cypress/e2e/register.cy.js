describe('teste register', () => {
  it('visits the app root url', () => {
    cy.visit('/register')
    cy.contains('h2', 'Registro')
    cy.get(':nth-child(1) > input').type('edu')
    cy.get('#email').type('teste@edu.com')
    cy.get('#password').type('senha123')
    cy.get('#password_confirmation').type('senha123')
    cy.get(':nth-child(1) > input').click()
  })
})
