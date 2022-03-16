<?php
namespace MailPoetVendor\Symfony\Component\Validator\Constraints;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Component\Validator\Constraint;
use MailPoetVendor\Symfony\Component\Validator\Exception\UnexpectedTypeException;
use MailPoetVendor\Symfony\Component\Validator\Exception\UnexpectedValueException;
class DateTimeValidator extends DateValidator
{
 public function validate($value, Constraint $constraint)
 {
 if (!$constraint instanceof DateTime) {
 throw new UnexpectedTypeException($constraint, DateTime::class);
 }
 if (null === $value || '' === $value) {
 return;
 }
 if ($value instanceof \DateTimeInterface) {
 @\trigger_error(\sprintf('Validating a \\DateTimeInterface with "%s" is deprecated since version 4.2. Use "%s" instead or remove the constraint if the underlying model is already type hinted to \\DateTimeInterface.', DateTime::class, Type::class), \E_USER_DEPRECATED);
 return;
 }
 if (!\is_scalar($value) && !(\is_object($value) && \method_exists($value, '__toString'))) {
 throw new UnexpectedValueException($value, 'string');
 }
 $value = (string) $value;
 \DateTime::createFromFormat($constraint->format, $value);
 $errors = \DateTime::getLastErrors();
 if (0 < $errors['error_count']) {
 $this->context->buildViolation($constraint->message)->setParameter('{{ value }}', $this->formatValue($value))->setCode(DateTime::INVALID_FORMAT_ERROR)->addViolation();
 return;
 }
 if (\str_ends_with($constraint->format, '+')) {
 $errors['warnings'] = \array_filter($errors['warnings'], function ($warning) {
 return 'Trailing data' !== $warning;
 });
 }
 foreach ($errors['warnings'] as $warning) {
 if ('The parsed date was invalid' === $warning) {
 $this->context->buildViolation($constraint->message)->setParameter('{{ value }}', $this->formatValue($value))->setCode(DateTime::INVALID_DATE_ERROR)->addViolation();
 } elseif ('The parsed time was invalid' === $warning) {
 $this->context->buildViolation($constraint->message)->setParameter('{{ value }}', $this->formatValue($value))->setCode(DateTime::INVALID_TIME_ERROR)->addViolation();
 } else {
 $this->context->buildViolation($constraint->message)->setParameter('{{ value }}', $this->formatValue($value))->setCode(DateTime::INVALID_FORMAT_ERROR)->addViolation();
 }
 }
 }
}
